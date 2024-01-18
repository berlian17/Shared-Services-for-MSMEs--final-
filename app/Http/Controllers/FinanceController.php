<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
            <form action="" method="GET">
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
        return view('Finance_Apps.pages.manage.profitLoss');
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
        $html = '';

        $html .= '
            <h6 class="mb-3 text-gray-800 text-center"><b>PROFIT & LOSS</b></h6>
            <h6 class="mb-3 text-gray-800 text-center"><b>2024</b></h6>

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
        return view('Finance_Apps.pages.manage.cashFlow');
    }
}
