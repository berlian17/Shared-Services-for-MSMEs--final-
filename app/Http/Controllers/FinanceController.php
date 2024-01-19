<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CashIn;
use App\Models\CostOfGoodsSold;
use App\Models\CurrentAsset;
use App\Models\GeneralAdminCost;
use App\Models\NonCurrentAsset;
use App\Models\SellingServiceExpenses;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index()
    {
        return view('Finance_Apps.pages.manage.index');
    }

    private function strToIntr($str)
    {
        $string = str_replace('.', '', $str);
        $integer = (int)$string;

        return $integer;
    }

    // Balance Sheet
    public function balanceSheet()
    {
        return view('Finance_Apps.pages.manage.balanceSheet');
    }

    public function getBalanceSheet($month)
    {
        $year = date("Y");

        if ($month != 0) {
            // Get CA
            $ca = CurrentAsset::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            // Get NCA
            $nca = NonCurrentAsset::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            return response()->json([
                'status'    => true,
                'data'      => [
                    'ca'    => $ca,
                    'nca'   => $nca,
                ],
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    public function addBalanceSheet(Request $request)
    {
        // Validation data
        $validation = $request->validate([
            'month'                 => 'required',
            'cashCA'                => 'required',
            'accountsReceivableCA'  => 'required',
            'suppliesCA'            => 'required',
            'otherCA'               => 'required',
            'fixedAssetsNCA'        => 'required',
            'depreciationNCA'       => 'required',
        ]);

        // Insert CA
        CurrentAsset::create([
            'user_id'               => Auth::user()->id,
            'month'                 => $this->strToIntr($validation['month']),
            'cash'                  => $this->strToIntr($validation['cashCA']),
            'accounts_receivable'   => $this->strToIntr($validation['accountsReceivableCA']),
            'supplies'              => $this->strToIntr($validation['suppliesCA']),
            'other_current_assets'  => $this->strToIntr($validation['otherCA']),
        ])->save();

        // Insert NCA
        NonCurrentAsset::create([
            'user_id'       => Auth::user()->id,
            'month'         => $this->strToIntr($validation['month']),
            'fixed_assets'  => $this->strToIntr($validation['fixedAssetsNCA']),
            'depreciation'  => $this->strToIntr($validation['depreciationNCA']),
        ])->save();

        return redirect()->back();
    }

    public function updateBalanceSheet(Request $request)
    {
        // Get data
        $caID = $request->input('caID');
        $ncaID = $request->input('ncaID');
        $current_asset = CurrentAsset::where('id', $caID)->first();
        $non_current_asset = NonCurrentAsset::where('id', $ncaID)->first();

        // Validation data
        $validation = $request->validate([
            'cashCA'                => 'required',
            'accountsReceivableCA'  => 'required',
            'suppliesCA'            => 'required',
            'otherCA'               => 'required',
            'fixedAssetsNCA'        => 'required',
            'depreciationNCA'       => 'required',
        ]);

        // Update CA
        $current_asset->update([
            'cash'                  => $this->strToIntr($validation['cashCA']),
            'accounts_receivable'   => $this->strToIntr($validation['accountsReceivableCA']),
            'supplies'              => $this->strToIntr($validation['suppliesCA']),
            'other_current_assets'  => $this->strToIntr($validation['otherCA']),
        ]);

        // Update NCA
        $non_current_asset->update([
            'fixed_assets'  => $this->strToIntr($validation['fixedAssetsNCA']),
            'depreciation'  => $this->strToIntr($validation['depreciationNCA']),
        ]);

        return redirect()->back();
    }

    public function balanceSheetReport(Request $request)
    {
        // Get data
        $dateStart = DateTime::createFromFormat('Y-m-d', $request->dateStart);
        $dateEnd = DateTime::createFromFormat('Y-m-d', $request->dateEnd);
        $monthStart = (int)$dateStart->format('m');
        $monthEnd = (int)$dateEnd->format('m');
        $months = range($monthStart, $monthEnd);
        $year = (int)$dateEnd->format('Y');
        $html = '';

        $cashCA = 0;
        $accountsReceivableCA = 0;
        $suppliesCA = 0;
        $otherCA = 0;
        $totalCA = 0;

        $fixedAssetsNCA = 0;
        $depreciationNCA = 0;
        $totalNCA = 0;

        foreach ($months as $month) {
            $ca = CurrentAsset::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            $nca = NonCurrentAsset::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            if ($ca) {
                $cashCA += $ca->cash;
                $accountsReceivableCA += $ca->accounts_receivable;
                $suppliesCA += $ca->supplies;
                $otherCA += $ca->other_current_assets;
            }

            if ($nca) {
                $fixedAssetsNCA += $nca->fixed_assets;
                $depreciationNCA += $nca->depreciation;
            }
        }

        $totalCA = $cashCA + $accountsReceivableCA + $suppliesCA + $otherCA;
        $totalNCA = $fixedAssetsNCA + $depreciationNCA;
        $totalAsset = $totalCA + $totalNCA;

        $html .= '
            <h6 class="mb-3 text-gray-800 text-center"><b>BALANCE SHEET</b></h6>
            <h6 class="mb-3 text-gray-800 text-center"><b>PER TANGGAL ' . date("d/m/Y", strtotime($request->dateStart)) . ' - ' . date("d/m/Y", strtotime($request->dateEnd)) . '</b></h6>
            <table class="table">
                <thead class="table-primary">
                    <th><b>Aset Lancar</b></th>
                    <th><b><span class="prevMonthCA"></b></th>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-indent: 40px;">Kas dan setara kas</td>
                        <td>Rp ' .  number_format($cashCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td style="text-indent: 40px;">Piutang usaha</td>
                        <td>Rp ' .  number_format($accountsReceivableCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td style="text-indent: 40px;">Persediaan</td>
                        <td>Rp ' .  number_format($suppliesCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td style="text-indent: 40px;">Aset lancar lainnya</td>
                        <td>Rp ' .  number_format($otherCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td><b>Jumlah aset lancar</b></td>
                        <td><b>Rp ' .  number_format($totalCA, 0, ',', '.') . '</b></td>
                    </tr>
                    <tr>
                        <td class="table-primary"><b>Aset Tidak Lancar</b></td>
                        <td class="table-primary"></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 40px;">Aset tetap</td>
                        <td>Rp ' .  number_format($fixedAssetsNCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td style="text-indent: 40px;">Akumulasi penyusutan</td>
                        <td>Rp ' .  number_format($depreciationNCA, 0, ',', '.') . '</td>
                    </tr>
                    <tr>
                        <td><b>Jumlah aset tidak lancar</b></td>
                        <td><b>Rp ' .  number_format($totalNCA, 0, ',', '.') . '</b></td>
                    </tr>
                    <tr>
                        <td class="table-warning"><b>Jumlah aset</b></td>
                        <td class="table-warning" id="totalAsset"><b>Rp ' .  number_format($totalAsset, 0, ',', '.') . '</b></td>
                    </tr>
                </tbody>
            </table>
            <form action="' . route('report.exportBalanceSheet') . '" method="GET">
                <input type="text" name="dateStart" value="' . $request->dateStart . '" hidden>
                <input type="text" name="dateEnd" value="' . $request->dateEnd . '" hidden>
                <button type="submit" class="btn btn-warning btn-user px-5">
                    Export Laporan
                </button>
            </form>
        ';

        return $html;
    }

    // Profit & Loss
    public function profitLoss()
    {
        $years = CostOfGoodsSold::selectRaw('DISTINCT YEAR(created_at) as year')
            ->pluck('year');

        return view('Finance_Apps.pages.manage.profitLoss', compact('years'));
    }

    public function getProfitLoss($month)
    {
        $year = date("Y");

        if ($month != 0) {
            // Get COGS
            $cogs = CostOfGoodsSold::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            // Get SSE
            $sse = SellingServiceExpenses::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            // Get GAC
            $gac = GeneralAdminCost::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            return response()->json([
                'status'    => true,
                'data'      => [
                    'cogs'  => $cogs,
                    'sse'   => $sse,
                    'gac'   => $gac,
                ],
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    public function addProfitLoss(Request $request)
    {
        // Validation data
        $validation = $request->validate([
            'month'                     => 'required',
            'rawMaterialCOGS'           => 'required',
            'manpowerCOGS'              => 'required',
            'factoryOverheadCOGS'       => 'required',
            'admEcommerceSSE'           => 'required',
            'marketingSalarySSE'        => 'required',
            'marketingOperationsSSE'    => 'required',
            'otherCostSSE'              => 'required',
            'salariesAllowancesGA'      => 'required',
            'electricityWaterGA'        => 'required',
            'transportationGA'          => 'required',
            'communicationGA'           => 'required',
            'officeStationeryGA'        => 'required',
            'consultantGA'              => 'required',
            'cleanlinessSecurityGA'     => 'required',
            'maintenanceRenovationGA'   => 'required',
            'depreciationGA'            => 'required',
            'taxGA'                     => 'required',
            'otherCostGA'               => 'required',
        ]);

        // Insert COGS
        CostOfGoodsSold::create([
            'user_id'           => Auth::user()->id,
            'month'             => $this->strToIntr($validation['month']),
            'raw_material'      => $this->strToIntr($validation['rawMaterialCOGS']),
            'manpower'          => $this->strToIntr($validation['manpowerCOGS']),
            'factory_overhead'  => $this->strToIntr($validation['factoryOverheadCOGS']),
        ])->save();

        // Insert SSE
        SellingServiceExpenses::create([
            'user_id'               => Auth::user()->id,
            'month'                 => $this->strToIntr($validation['month']),
            'adm_ecommerce'         => $this->strToIntr($validation['admEcommerceSSE']),
            'marketing_salary'      => $this->strToIntr($validation['marketingSalarySSE']),
            'marketing_operations'  => $this->strToIntr($validation['marketingOperationsSSE']),
            'other_cost'            => $this->strToIntr($validation['otherCostSSE']),
        ])->save();

        // Insert GAC
        GeneralAdminCost::create([
            'user_id'                   => Auth::user()->id,
            'month'                     => $this->strToIntr($validation['month']),
            'salaries_and_allowances'   => $this->strToIntr($validation['salariesAllowancesGA']),
            'electricity_and_water'     => $this->strToIntr($validation['electricityWaterGA']),
            'transportation'            => $this->strToIntr($validation['transportationGA']),
            'communication'             => $this->strToIntr($validation['communicationGA']),
            'office_stationery'         => $this->strToIntr($validation['officeStationeryGA']),
            'consultant'                => $this->strToIntr($validation['consultantGA']),
            'cleanliness_and_security'  => $this->strToIntr($validation['cleanlinessSecurityGA']),
            'maintenance_and_renovation' => $this->strToIntr($validation['maintenanceRenovationGA']),
            'depreciation'              => $this->strToIntr($validation['depreciationGA']),
            'tax'                       => $this->strToIntr($validation['taxGA']),
            'other_cost'                => $this->strToIntr($validation['otherCostGA']),
        ])->save();

        return redirect()->back();
    }

    public function updateProfitLoss(Request $request)
    {
        // Get data
        $cogsID = $request->input('cogsID');
        $sseID = $request->input('sseID');
        $gacID = $request->input('gacID');
        $cost_of_goods_sold = CostOfGoodsSold::where('id', $cogsID)->first();
        $selling_service_expenses = SellingServiceExpenses::where('id', $sseID)->first();
        $general_admin_cost = GeneralAdminCost::where('id', $gacID)->first();

        // Validation data
        $validation = $request->validate([
            'rawMaterialCOGS'           => 'required',
            'manpowerCOGS'              => 'required',
            'factoryOverheadCOGS'       => 'required',
            'admEcommerceSSE'           => 'required',
            'marketingSalarySSE'        => 'required',
            'marketingOperationsSSE'    => 'required',
            'otherCostSSE'              => 'required',
            'salariesAllowancesGA'      => 'required',
            'electricityWaterGA'        => 'required',
            'transportationGA'          => 'required',
            'communicationGA'           => 'required',
            'officeStationeryGA'        => 'required',
            'consultantGA'              => 'required',
            'cleanlinessSecurityGA'     => 'required',
            'maintenanceRenovationGA'   => 'required',
            'depreciationGA'            => 'required',
            'taxGA'                     => 'required',
            'otherCostGA'               => 'required',
        ]);

        // Update COGS
        $cost_of_goods_sold->update([
            'raw_material'      => $this->strToIntr($validation['rawMaterialCOGS']),
            'manpower'          => $this->strToIntr($validation['manpowerCOGS']),
            'factory_overhead'  => $this->strToIntr($validation['factoryOverheadCOGS']),
        ]);

        // Update SSE
        $selling_service_expenses->update([
            'adm_ecommerce'         => $this->strToIntr($validation['admEcommerceSSE']),
            'marketing_salary'      => $this->strToIntr($validation['marketingSalarySSE']),
            'marketing_operations'  => $this->strToIntr($validation['marketingOperationsSSE']),
            'other_cost'            => $this->strToIntr($validation['otherCostSSE']),
        ]);

        // Update GAC
        $general_admin_cost->update([
            'salaries_and_allowances'   => $this->strToIntr($validation['salariesAllowancesGA']),
            'electricity_and_water'     => $this->strToIntr($validation['electricityWaterGA']),
            'transportation'            => $this->strToIntr($validation['transportationGA']),
            'communication'             => $this->strToIntr($validation['communicationGA']),
            'office_stationery'         => $this->strToIntr($validation['officeStationeryGA']),
            'consultant'                => $this->strToIntr($validation['consultantGA']),
            'cleanliness_and_security'  => $this->strToIntr($validation['cleanlinessSecurityGA']),
            'maintenance_and_renovation' => $this->strToIntr($validation['maintenanceRenovationGA']),
            'depreciation'              => $this->strToIntr($validation['depreciationGA']),
            'tax'                       => $this->strToIntr($validation['taxGA']),
            'other_cost'                => $this->strToIntr($validation['otherCostGA']),
        ]);

        return redirect()->back();
    }

    public function profitLossReport(Request $request)
    {
        // Get data
        $cogs = CostOfGoodsSold::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $request->year)
            ->get();
        $sse = SellingServiceExpenses::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $request->year)
            ->get();
        $gac = GeneralAdminCost::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $request->year)
            ->get();
        $html = '';

        // cogs
        $cogsArray = [];
        $totalHPP = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($cogs as $data) {
                if ($data->month == $i) {
                    $cogsArray[] = $data;
                    $totalHPP[] = ($data->raw_material + $data->manpower + $data->factory_overhead);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $cogsArray[] = null;
                $totalHPP[] = null;
            }
        }

        // sse
        $sseArray = [];
        $totalSSE = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($sse as $data) {
                if ($data->month == $i) {
                    $sseArray[] = $data;
                    $totalSSE[] = ($data->adm_ecommerce + $data->marketing_salary + $data->marketing_operations + $data->other_cost);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $sseArray[] = null;
                $totalSSE[] = null;
            }
        }

        // gac
        $gacArray = [];
        $totalGAC = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($gac as $data) {
                if ($data->month == $i) {
                    $gacArray[] = $data;
                    $totalGAC[] = ($data->salaries_and_allowances + $data->electricity_and_water + $data->transportation + $data->communication + $data->office_stationery + $data->consultant + $data->cleanliness_and_security + $data->maintenance_and_renovation + $data->depreciation + $data->tax + $data->other_cost);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $gacArray[] = null;
                $totalGAC[] = null;
            }
        }

        $html .= '
            <h6 class="mb-3 text-gray-800 text-center"><b>PROFIT & LOSS</b></h6>
            <h6 class="mb-3 text-gray-800 text-center"><b>TAHUN ' . $request->year . '</b></h6>

            <div class="table-responsive" style="width:2500px">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <th class="text-center" style="width:16%"><b>Keterangan</b></th>
                        <th class="text-center" style="width:7%"><b>Januari</b></th>
                        <th class="text-center" style="width:7%"><b>Februari</b></th>
                        <th class="text-center" style="width:7%"><b>Maret</b></th>
                        <th class="text-center" style="width:7%"><b>April</b></th>
                        <th class="text-center" style="width:7%"><b>Mei</b></th>
                        <th class="text-center" style="width:7%"><b>Juni</b></th>
                        <th class="text-center" style="width:7%"><b>Juli</b></th>
                        <th class="text-center" style="width:7%"><b>Agustus</b></th>
                        <th class="text-center" style="width:7%"><b>September</b></th>
                        <th class="text-center" style="width:7%"><b>Oktober</b></th>
                        <th class="text-center" style="width:7%"><b>November</b></th>
                        <th class="text-center" style="width:7%"><b>Desember</b></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="13" class="table-secondary"><b>Penjualan</b></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">Sales</td>
                            <td>Rp ' . number_format(0, 0, ',', '.') . '</td>
                        </tr>
                        <tr>
                            <td class="table-warning"><b>Total Sales</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
                        </tr>
                        <tr>
                            <td colspan="13" class="table-secondary"><b>HPP</b></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Bahan baku</td>
                            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->raw_material, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->raw_material, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px">BI. Tenaga kerja</td>
                            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->manpower, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->manpower, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Overhead pabrik</td>
                            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->factory_overhead, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->factory_overhead, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td class="table-warning"><b>Total HPP</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[0]) ? number_format($totalHPP[0], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[1]) ? number_format($totalHPP[1], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[2]) ? number_format($totalHPP[2], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[3]) ? number_format($totalHPP[3], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[4]) ? number_format($totalHPP[4], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[5]) ? number_format($totalHPP[5], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[6]) ? number_format($totalHPP[6], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[7]) ? number_format($totalHPP[7], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[8]) ? number_format($totalHPP[8], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[9]) ? number_format($totalHPP[9], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[10]) ? number_format($totalHPP[10], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalHPP[11]) ? number_format($totalHPP[11], 0, ',', '.') : "0") . '</b></td>
                        </tr>
                        <tr>
                            <td colspan="13" class="table-secondary"><b>BI. Penjualan</b></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Adm e-commerce</td>
                            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Gaji marketing</td>
                            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->marketing_salary, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->marketing_salary, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">Operasional marketing</td>
                            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->marketing_operations, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->marketing_operations, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Lain marketing</td>
                            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->other_cost, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td class="table-warning"><b>Total Sales & Service Expenses</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[0]) ? number_format($totalSSE[0], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[1]) ? number_format($totalSSE[1], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[2]) ? number_format($totalSSE[2], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[3]) ? number_format($totalSSE[3], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[4]) ? number_format($totalSSE[4], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[5]) ? number_format($totalSSE[5], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[6]) ? number_format($totalSSE[6], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[7]) ? number_format($totalSSE[7], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[8]) ? number_format($totalSSE[8], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[9]) ? number_format($totalSSE[9], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[10]) ? number_format($totalSSE[10], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalSSE[11]) ? number_format($totalSSE[11], 0, ',', '.') : "0") . '</b></td>
                        </tr>
                        <tr>
                            <td colspan="13" class="table-secondary"><b>BI. Adm & Umum</b></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Gaji & tunjangan</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Listrik dan air</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->electricity_and_water, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Transportasi</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->transportation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->transportation, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Komunikasi</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->communication, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->communication, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. ATK</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->office_stationery, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->office_stationery, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Konsultan</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->consultant, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->consultant, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Kebersihan & keamanan</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Pemeliharaan & renovasi</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Penyusutan</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->depreciation, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->depreciation, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Pajak</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->tax, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->tax, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 40px;">BI. Adm & umum lainnya</td>
                            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->other_cost, 0, ',', '.') : "0") . '</td>
                            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->other_cost, 0, ',', '.') : "0") . '</td>
                        </tr>
                        <tr>
                            <td class="table-warning"><b>Total Adm & Umum</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[0]) ? number_format($totalGAC[0], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[1]) ? number_format($totalGAC[1], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[2]) ? number_format($totalGAC[2], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[3]) ? number_format($totalGAC[3], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[4]) ? number_format($totalGAC[4], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[5]) ? number_format($totalGAC[5], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[6]) ? number_format($totalGAC[6], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[7]) ? number_format($totalGAC[7], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[8]) ? number_format($totalGAC[8], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[9]) ? number_format($totalGAC[9], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[10]) ? number_format($totalGAC[10], 0, ',', '.') : "0") . '</b></td>
                            <td class="table-warning"><b>Rp ' . (isset($totalGAC[11]) ? number_format($totalGAC[11], 0, ',', '.') : "0") . '</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="" method="GET">
                <button type="submit" class="btn btn-warning btn-user px-5">
                    Export Laporan
                </button>
            </form>
        ';

        return $html;
    }

    // Cash Flow
    public function cashFlow()
    {
        $years = CashIn::selectRaw('DISTINCT YEAR(created_at) as year')
            ->pluck('year');

        return view('Finance_Apps.pages.manage.cashFlow', compact('years'));
    }

    public function getCashFlow($month)
    {
        $year = date("Y");

        if ($month != 0) {
            // Get CI
            $ci = CashIn::where('user_id', Auth::user()->id)
                ->where('month', $month)
                ->whereYear('created_at', '=', $year)
                ->first();

            return response()->json([
                'status'    => true,
                'data'      => [
                    'ci'    => $ci,
                ],
            ]);
        } else {
            return response()->json([
                'status'    => false,
            ]);
        }
    }

    public function addCashFlow(Request $request)
    {
        // Validation data
        $validation = $request->validate([
            'month'     => 'required',
            'cashCI'    => 'required',
        ]);

        // Insert CI
        CashIn::create([
            'user_id'   => Auth::user()->id,
            'month'     => $this->strToIntr($validation['month']),
            'cash'      => $this->strToIntr($validation['cashCI']),
        ])->save();

        return redirect()->back();
    }

    public function updateCashFlow(Request $request)
    {
        // Get data
        $ciID = $request->input('ciID');
        $cash_in = CashIn::where('id', $ciID)->first();

        // Validation data
        $validation = $request->validate([
            'cashCI'    => 'required',
        ]);

        // Update CI
        $cash_in->update(['cash' => $this->strToIntr($validation['cashCI'])]);

        return redirect()->back();
    }

    public function cashFlowReport(Request $request)
    {
        // Get data
        $ci = CashIn::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $request->year)
            ->get();
        $html = '';

        // cogs
        $ciArray = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($ci as $data) {
                if ($data->month == $i) {
                    $ciArray[] = $data;
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $ciArray[] = null;
            }
        }

        $html .= '
            <h6 class="mb-3 text-gray-800 text-center"><b>CASH FLOW</b></h6>
            <h6 class="mb-3 text-gray-800 text-center"><b>TAHUN ' . $request->year . '</b></h6>

            <div class="table-responsive" style="width:2500px">
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <th class="text-center" style="width:16%"><b>Item</b></th>
                        <th class="text-center" style="width:7%"><b>Januari</b></th>
                        <th class="text-center" style="width:7%"><b>Februari</b></th>
                        <th class="text-center" style="width:7%"><b>Maret</b></th>
                        <th class="text-center" style="width:7%"><b>April</b></th>
                        <th class="text-center" style="width:7%"><b>Mei</b></th>
                        <th class="text-center" style="width:7%"><b>Juni</b></th>
                        <th class="text-center" style="width:7%"><b>Juli</b></th>
                        <th class="text-center" style="width:7%"><b>Agustus</b></th>
                        <th class="text-center" style="width:7%"><b>September</b></th>
                        <th class="text-center" style="width:7%"><b>Oktober</b></th>
                        <th class="text-center" style="width:7%"><b>November</b></th>
                        <th class="text-center" style="width:7%"><b>Desember</b></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Cash In</td>
                        </tr>
                        <tr>
                            <td>Sales</td>
                        </tr>
                        <tr>
                            <td>Cost of Goods Sold (COGS)</td>
                        </tr>
                        <tr>
                            <td>Selling & Service Expenses (SSE)</td>
                        </tr>
                        <tr>
                            <td>General & Admin Cost (G&A)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="" method="GET">
                <button type="submit" class="btn btn-warning btn-user px-5">
                    Export Laporan
                </button>
            </form>
        ';

        return $html;
    }
}
