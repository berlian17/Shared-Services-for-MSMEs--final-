<?php

namespace App\Exports;

use App\Models\CostOfGoodsSold;
use App\Models\GeneralAdminCost;
use App\Models\OrderDetail;
use App\Models\SellingServiceExpenses;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class exportProfitLossReport implements FromView, ShouldAutoSize, WithStyles
{
    private $year;
    private $salesMonth1, $salesMonth2, $salesMonth3, $salesMonth4, $salesMonth5, $salesMonth6, $salesMonth7, $salesMonth8, $salesMonth9, $salesMonth10, $salesMonth11, $salesMonth12;
    private $cogsArray1, $cogsArray2, $cogsArray3, $cogsArray4, $cogsArray5, $cogsArray6, $cogsArray7, $cogsArray8, $cogsArray9, $cogsArray10, $cogsArray11, $cogsArray12;
    private $totalHPP1, $totalHPP2, $totalHPP3, $totalHPP4, $totalHPP5, $totalHPP6, $totalHPP7, $totalHPP8, $totalHPP9, $totalHPP10, $totalHPP11, $totalHPP12;
    private $gross1, $gross2, $gross3, $gross4, $gross5, $gross6, $gross7, $gross8, $gross9, $gross10, $gross11, $gross12;
    private $sseArray1, $sseArray2, $sseArray3, $sseArray4, $sseArray5, $sseArray6, $sseArray7, $sseArray8, $sseArray9, $sseArray10, $sseArray11, $sseArray12;
    private $totalSSE1, $totalSSE2, $totalSSE3, $totalSSE4, $totalSSE5, $totalSSE6, $totalSSE7, $totalSSE8, $totalSSE9, $totalSSE10, $totalSSE11, $totalSSE12;
    private $operatingIncome1, $operatingIncome2, $operatingIncome3, $operatingIncome4, $operatingIncome5, $operatingIncome6, $operatingIncome7, $operatingIncome8, $operatingIncome9, $operatingIncome10, $operatingIncome11, $operatingIncome12;
    private $gacArray1, $gacArray2, $gacArray3, $gacArray4, $gacArray5, $gacArray6, $gacArray7, $gacArray8, $gacArray9, $gacArray10, $gacArray11, $gacArray12;
    private $totalGAC1, $totalGAC2, $totalGAC3, $totalGAC4, $totalGAC5, $totalGAC6, $totalGAC7, $totalGAC8, $totalGAC9, $totalGAC10, $totalGAC11, $totalGAC12;
    private $net1, $net2, $net3, $net4, $net5, $net6, $net7, $net8, $net9, $net10, $net11, $net12;

    public function __construct($year)
    {
        $sales = OrderDetail::select('order_details.*', 'orders.order_date')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('orders.order_date', '=', $year)
            ->get();
        $cogs = CostOfGoodsSold::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $year)
            ->get();
        $sse = SellingServiceExpenses::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $year)
            ->get();
        $gac = GeneralAdminCost::where('user_id', Auth::user()->id)
            ->whereYear('created_at', '=', $year)
            ->get();

        // sales
        $salesMonth = [];
        for ($i = 1; $i <= 12; $i++) {
            $salesMonth[str_pad($i, 2, '0', STR_PAD_LEFT)] = 0;
        }

        foreach ($sales as $sale) {
            $month = (new DateTime($sale->order_date))->format('m');
            $totalSales = $sale->total_price;

            $salesMonth[$month] += $totalSales;
        }

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

        // net
        $net1 = ($salesMonth["01"] - $totalHPP[0] - $totalSSE[0] - $totalGAC[0]);
        $net2 = $salesMonth["02"] ? $net1 + ($salesMonth["02"] - $totalHPP[1] - $totalSSE[1] - $totalGAC[1]) : 0;
        $net3 = $salesMonth["03"] ? $net2 + ($salesMonth["03"] - $totalHPP[2] - $totalSSE[2] - $totalGAC[2]) : 0;
        $net4 = $salesMonth["04"] ? $net3 + ($salesMonth["04"] - $totalHPP[3] - $totalSSE[3] - $totalGAC[3]) : 0;
        $net5 = $salesMonth["05"] ? $net4 + ($salesMonth["05"] - $totalHPP[4] - $totalSSE[4] - $totalGAC[4]) : 0;
        $net6 = $salesMonth["06"] ? $net5 + ($salesMonth["06"] - $totalHPP[5] - $totalSSE[5] - $totalGAC[5]) : 0;
        $net7 = $salesMonth["07"] ? $net6 + ($salesMonth["07"] - $totalHPP[6] - $totalSSE[6] - $totalGAC[6]) : 0;
        $net8 = $salesMonth["08"] ? $net7 + ($salesMonth["08"] - $totalHPP[7] - $totalSSE[7] - $totalGAC[7]) : 0;
        $net9 = $salesMonth["09"] ? $net8 + ($salesMonth["09"] - $totalHPP[8] - $totalSSE[8] - $totalGAC[8]) : 0;
        $net10 = $salesMonth["10"] ? $net9 + ($salesMonth["10"] - $totalHPP[9] - $totalSSE[9] - $totalGAC[9]) : 0;
        $net11 = $salesMonth["11"] ? $net10 + ($salesMonth["11"] - $totalHPP[10] - $totalSSE[10] - $totalGAC[10]) : 0;
        $net12 = $salesMonth["12"] ? $net11 + ($salesMonth["12"] - $totalHPP[11] - $totalSSE[11] - $totalGAC[11]) : 0;

        $this->year = $year;

        // sales
        $this->salesMonth1 = $salesMonth["01"];
        $this->salesMonth2 = $salesMonth["02"];
        $this->salesMonth3 = $salesMonth["03"];
        $this->salesMonth4 = $salesMonth["04"];
        $this->salesMonth5 = $salesMonth["05"];
        $this->salesMonth6 = $salesMonth["06"];
        $this->salesMonth7 = $salesMonth["07"];
        $this->salesMonth8 = $salesMonth["08"];
        $this->salesMonth9 = $salesMonth["09"];
        $this->salesMonth10 = $salesMonth["10"];
        $this->salesMonth11 = $salesMonth["11"];
        $this->salesMonth12 = $salesMonth["12"];

        // cogs
        $this->cogsArray1 = $cogsArray[0];
        $this->cogsArray2 = $cogsArray[1];
        $this->cogsArray3 = $cogsArray[2];
        $this->cogsArray4 = $cogsArray[3];
        $this->cogsArray5 = $cogsArray[4];
        $this->cogsArray6 = $cogsArray[5];
        $this->cogsArray7 = $cogsArray[6];
        $this->cogsArray8 = $cogsArray[7];
        $this->cogsArray9 = $cogsArray[8];
        $this->cogsArray10 = $cogsArray[9];
        $this->cogsArray11 = $cogsArray[10];
        $this->cogsArray12 = $cogsArray[11];

        // total hpp
        $this->totalHPP1 = $totalHPP[0];
        $this->totalHPP2 = $totalHPP[1];
        $this->totalHPP3 = $totalHPP[2];
        $this->totalHPP4 = $totalHPP[3];
        $this->totalHPP5 = $totalHPP[4];
        $this->totalHPP6 = $totalHPP[5];
        $this->totalHPP7 = $totalHPP[6];
        $this->totalHPP8 = $totalHPP[7];
        $this->totalHPP9 = $totalHPP[8];
        $this->totalHPP10 = $totalHPP[9];
        $this->totalHPP11 = $totalHPP[10];
        $this->totalHPP12 = $totalHPP[11];

        // gross
        $this->gross1 = $salesMonth["01"] - $totalHPP[0];
        $this->gross2 = $salesMonth["02"] ? $net1 + ($salesMonth["02"] - $totalHPP[1]) : 0;
        $this->gross3 = $salesMonth["03"] ? $net2 + ($salesMonth["03"] - $totalHPP[2]) : 0;
        $this->gross4 = $salesMonth["04"] ? $net3 + ($salesMonth["04"] - $totalHPP[3]) : 0;
        $this->gross5 = $salesMonth["05"] ? $net4 + ($salesMonth["05"] - $totalHPP[4]) : 0;
        $this->gross6 = $salesMonth["06"] ? $net5 + ($salesMonth["06"] - $totalHPP[5]) : 0;
        $this->gross7 = $salesMonth["07"] ? $net6 + ($salesMonth["07"] - $totalHPP[6]) : 0;
        $this->gross8 = $salesMonth["08"] ? $net7 + ($salesMonth["08"] - $totalHPP[7]) : 0;
        $this->gross9 = $salesMonth["09"] ? $net8 + ($salesMonth["09"] - $totalHPP[8]) : 0;
        $this->gross10 = $salesMonth["10"] ? $net9 + ($salesMonth["10"] - $totalHPP[9]) : 0;
        $this->gross11 = $salesMonth["11"] ? $net10 + ($salesMonth["11"] - $totalHPP[10]) : 0;
        $this->gross12 = $salesMonth["12"] ? $net11 + ($salesMonth["12"] - $totalHPP[11]) : 0;

        // sse
        $this->sseArray1 = $sseArray[0];
        $this->sseArray2 = $sseArray[1];
        $this->sseArray3 = $sseArray[2];
        $this->sseArray4 = $sseArray[3];
        $this->sseArray5 = $sseArray[4];
        $this->sseArray6 = $sseArray[5];
        $this->sseArray7 = $sseArray[6];
        $this->sseArray8 = $sseArray[7];
        $this->sseArray9 = $sseArray[8];
        $this->sseArray10 = $sseArray[9];
        $this->sseArray11 = $sseArray[10];
        $this->sseArray12 = $sseArray[11];

        // total sse
        $this->totalSSE1 = $totalSSE[0];
        $this->totalSSE2 = $totalSSE[1];
        $this->totalSSE3 = $totalSSE[2];
        $this->totalSSE4 = $totalSSE[3];
        $this->totalSSE5 = $totalSSE[4];
        $this->totalSSE6 = $totalSSE[5];
        $this->totalSSE7 = $totalSSE[6];
        $this->totalSSE8 = $totalSSE[7];
        $this->totalSSE9 = $totalSSE[8];
        $this->totalSSE10 = $totalSSE[9];
        $this->totalSSE11 = $totalSSE[10];
        $this->totalSSE12 = $totalSSE[11];

        // operating
        $this->operatingIncome1 = $totalSSE[0] ? ($salesMonth["01"] - $totalHPP[0] - $totalSSE[0]) : 0;
        $this->operatingIncome2 = $totalSSE[1] ? $net1 + ($salesMonth["02"] - $totalHPP[1] - $totalSSE[1]) : 0;
        $this->operatingIncome3 = $totalSSE[2] ? $net2 + ($salesMonth["03"] - $totalHPP[2] - $totalSSE[2]) : 0;
        $this->operatingIncome4 = $totalSSE[3] ? $net3 + ($salesMonth["04"] - $totalHPP[3] - $totalSSE[3]) : 0;
        $this->operatingIncome5 = $totalSSE[4] ? $net4 + ($salesMonth["05"] - $totalHPP[4] - $totalSSE[4]) : 0;
        $this->operatingIncome6 = $totalSSE[5] ? $net5 + ($salesMonth["06"] - $totalHPP[5] - $totalSSE[5]) : 0;
        $this->operatingIncome7 = $totalSSE[6] ? $net6 + ($salesMonth["07"] - $totalHPP[6] - $totalSSE[6]) : 0;
        $this->operatingIncome8 = $totalSSE[7] ? $net7 + ($salesMonth["08"] - $totalHPP[7] - $totalSSE[7]) : 0;
        $this->operatingIncome9 = $totalSSE[8] ? $net8 + ($salesMonth["09"] - $totalHPP[8] - $totalSSE[8]) : 0;
        $this->operatingIncome10 = $totalSSE[9] ? $net9 + ($salesMonth["10"] - $totalHPP[9] - $totalSSE[9]) : 0;
        $this->operatingIncome11 = $totalSSE[10] ? $net10 + ($salesMonth["11"] - $totalHPP[10] - $totalSSE[10]) : 0;
        $this->operatingIncome12 = $totalSSE[11] ? $net11 + ($salesMonth["12"] - $totalHPP[11] - $totalSSE[11]) : 0;

        // gac
        $this->gacArray1 = $gacArray[0];
        $this->gacArray2 = $gacArray[1];
        $this->gacArray3 = $gacArray[2];
        $this->gacArray4 = $gacArray[3];
        $this->gacArray5 = $gacArray[4];
        $this->gacArray6 = $gacArray[5];
        $this->gacArray7 = $gacArray[6];
        $this->gacArray8 = $gacArray[7];
        $this->gacArray9 = $gacArray[8];
        $this->gacArray10 = $gacArray[9];
        $this->gacArray11 = $gacArray[10];
        $this->gacArray12 = $gacArray[11];

        // total gac
        $this->totalGAC1 = $totalGAC[0];
        $this->totalGAC2 = $totalGAC[1];
        $this->totalGAC3 = $totalGAC[2];
        $this->totalGAC4 = $totalGAC[3];
        $this->totalGAC5 = $totalGAC[4];
        $this->totalGAC6 = $totalGAC[5];
        $this->totalGAC7 = $totalGAC[6];
        $this->totalGAC8 = $totalGAC[7];
        $this->totalGAC9 = $totalGAC[8];
        $this->totalGAC10 = $totalGAC[9];
        $this->totalGAC11 = $totalGAC[10];
        $this->totalGAC12 = $totalGAC[11];

        // net
        $this->net1 = $net1;
        $this->net2 = $net2;
        $this->net3 = $net3;
        $this->net4 = $net4;
        $this->net5 = $net5;
        $this->net6 = $net6;
        $this->net7 = $net7;
        $this->net8 = $net8;
        $this->net9 = $net9;
        $this->net10 = $net10;
        $this->net11 = $net11;
        $this->net12 = $net12;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A4:M34' => [
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => [
                            'argb' => '000000'
                        ],
                    ],
                    'inside' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => [
                            'argb' => '000000'
                        ],
                    ],
                ],
            ],
            'A4:M4' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'a3b6ee', // dark blue
                    ],
                ],
            ],
            'A5' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'dddde2', // grey
                    ],
                ],
            ],
            'A7:M7' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'fceec9', // yellow
                    ],
                ],
            ],
            'A8' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'dddde2', // grey
                    ],
                ],
            ],
            'A12:M12' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'fceec9', // yellow
                    ],
                ],
            ],
            'A13:M13' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'c7ebf1', // blue
                    ],
                ],
            ],
            'A14' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'dddde2', // grey
                    ],
                ],
            ],
            'A19:M19' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'fceec9', // yellow
                    ],
                ],
            ],
            'A20:M20' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'c7ebf1', // blue
                    ],
                ],
            ],
            'A21' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'dddde2', // grey
                    ],
                ],
            ],
            'A33:M33' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'fceec9', // yellow
                    ],
                ],
            ],
            'A34:M34' => [
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'argb' => 'c7ebf1', // blue
                    ],
                ],
            ],
        ];
    }

    public function view(): View
    {
        return view('Finance_Apps.export.profitLossReport', [
            'year'              => $this->year,
            'salesMonth1'       => $this->salesMonth1,
            'salesMonth2'       => $this->salesMonth2,
            'salesMonth3'       => $this->salesMonth3,
            'salesMonth4'       => $this->salesMonth4,
            'salesMonth5'       => $this->salesMonth5,
            'salesMonth6'       => $this->salesMonth6,
            'salesMonth7'       => $this->salesMonth7,
            'salesMonth8'       => $this->salesMonth8,
            'salesMonth9'       => $this->salesMonth9,
            'salesMonth10'      => $this->salesMonth10,
            'salesMonth11'      => $this->salesMonth11,
            'salesMonth12'      => $this->salesMonth12,
            'cogsArray1'        => $this->cogsArray1,
            'cogsArray2'        => $this->cogsArray2,
            'cogsArray3'        => $this->cogsArray3,
            'cogsArray4'        => $this->cogsArray4,
            'cogsArray5'        => $this->cogsArray5,
            'cogsArray6'        => $this->cogsArray6,
            'cogsArray7'        => $this->cogsArray7,
            'cogsArray8'        => $this->cogsArray8,
            'cogsArray9'        => $this->cogsArray9,
            'cogsArray10'       => $this->cogsArray10,
            'cogsArray11'       => $this->cogsArray11,
            'cogsArray12'       => $this->cogsArray12,
            'totalHPP1'         => $this->totalHPP1,
            'totalHPP2'         => $this->totalHPP2,
            'totalHPP3'         => $this->totalHPP3,
            'totalHPP4'         => $this->totalHPP4,
            'totalHPP5'         => $this->totalHPP5,
            'totalHPP6'         => $this->totalHPP6,
            'totalHPP7'         => $this->totalHPP7,
            'totalHPP8'         => $this->totalHPP8,
            'totalHPP9'         => $this->totalHPP9,
            'totalHPP10'        => $this->totalHPP10,
            'totalHPP11'        => $this->totalHPP11,
            'totalHPP12'        => $this->totalHPP12,
            'gross1'            => $this->gross1,
            'gross2'            => $this->gross2,
            'gross3'            => $this->gross3,
            'gross4'            => $this->gross4,
            'gross5'            => $this->gross5,
            'gross6'            => $this->gross6,
            'gross7'            => $this->gross7,
            'gross8'            => $this->gross8,
            'gross9'            => $this->gross9,
            'gross10'           => $this->gross10,
            'gross11'           => $this->gross11,
            'gross12'           => $this->gross12,
            'sseArray1'         => $this->sseArray1,
            'sseArray2'         => $this->sseArray2,
            'sseArray3'         => $this->sseArray3,
            'sseArray4'         => $this->sseArray4,
            'sseArray5'         => $this->sseArray5,
            'sseArray6'         => $this->sseArray6,
            'sseArray7'         => $this->sseArray7,
            'sseArray8'         => $this->sseArray8,
            'sseArray9'         => $this->sseArray9,
            'sseArray10'        => $this->sseArray10,
            'sseArray11'        => $this->sseArray11,
            'sseArray12'        => $this->sseArray12,
            'totalSSE1'         => $this->totalSSE1,
            'totalSSE2'         => $this->totalSSE2,
            'totalSSE3'         => $this->totalSSE3,
            'totalSSE4'         => $this->totalSSE4,
            'totalSSE5'         => $this->totalSSE5,
            'totalSSE6'         => $this->totalSSE6,
            'totalSSE7'         => $this->totalSSE7,
            'totalSSE8'         => $this->totalSSE8,
            'totalSSE9'         => $this->totalSSE9,
            'totalSSE10'        => $this->totalSSE10,
            'totalSSE11'        => $this->totalSSE11,
            'totalSSE12'        => $this->totalSSE12,
            'operatingIncome1'  => $this->operatingIncome1,
            'operatingIncome2'  => $this->operatingIncome2,
            'operatingIncome3'  => $this->operatingIncome3,
            'operatingIncome4'  => $this->operatingIncome4,
            'operatingIncome5'  => $this->operatingIncome5,
            'operatingIncome6'  => $this->operatingIncome6,
            'operatingIncome7'  => $this->operatingIncome7,
            'operatingIncome8'  => $this->operatingIncome8,
            'operatingIncome9'  => $this->operatingIncome9,
            'operatingIncome10' => $this->operatingIncome10,
            'operatingIncome11' => $this->operatingIncome11,
            'operatingIncome12' => $this->operatingIncome12,
            'gacArray1'         => $this->gacArray1,
            'gacArray2'         => $this->gacArray2,
            'gacArray3'         => $this->gacArray3,
            'gacArray4'         => $this->gacArray4,
            'gacArray5'         => $this->gacArray5,
            'gacArray6'         => $this->gacArray6,
            'gacArray7'         => $this->gacArray7,
            'gacArray8'         => $this->gacArray8,
            'gacArray9'         => $this->gacArray9,
            'gacArray10'        => $this->gacArray10,
            'gacArray11'        => $this->gacArray11,
            'gacArray12'        => $this->gacArray12,
            'totalGAC1'         => $this->totalGAC1,
            'totalGAC2'         => $this->totalGAC2,
            'totalGAC3'         => $this->totalGAC3,
            'totalGAC4'         => $this->totalGAC4,
            'totalGAC5'         => $this->totalGAC5,
            'totalGAC6'         => $this->totalGAC6,
            'totalGAC7'         => $this->totalGAC7,
            'totalGAC8'         => $this->totalGAC8,
            'totalGAC9'         => $this->totalGAC9,
            'totalGAC10'        => $this->totalGAC10,
            'totalGAC11'        => $this->totalGAC11,
            'totalGAC12'        => $this->totalGAC12,
            'net1'              => $this->net1,
            'net2'              => $this->net2,
            'net3'              => $this->net3,
            'net4'              => $this->net4,
            'net5'              => $this->net5,
            'net6'              => $this->net6,
            'net7'              => $this->net7,
            'net8'              => $this->net8,
            'net9'              => $this->net9,
            'net10'             => $this->net10,
            'net11'             => $this->net11,
            'net12'             => $this->net12,
        ]);
    }
}
