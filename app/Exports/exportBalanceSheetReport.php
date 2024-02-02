<?php

namespace App\Exports;

use App\Models\CurrentAsset;
use App\Models\NonCurrentAsset;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class exportBalanceSheetReport implements FromView
{
    private $dateStart, $dateEnd, $cashCA, $accountsReceivableCA, $suppliesCA, $otherCA, $totalCA, $fixedAssetsNCA, $depreciationNCA, $totalNCA, $totalAsset;

    public function __construct($dateStartInput, $dateEndInput)
    {
        $dateStart = DateTime::createFromFormat('Y-m-d', $dateStartInput);
        $dateEnd = DateTime::createFromFormat('Y-m-d', $dateEndInput);
        $monthStart = (int)$dateStart->format('m');
        $monthEnd = (int)$dateEnd->format('m');
        $months = range($monthStart, $monthEnd);
        $year = (int)$dateEnd->format('Y');

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

        $this->dateStart = $dateStartInput;
        $this->dateEnd = $dateEndInput;
        $this->totalAsset = $totalAsset;

        $this->cashCA = $cashCA;
        $this->accountsReceivableCA = $accountsReceivableCA;
        $this->suppliesCA = $suppliesCA;
        $this->otherCA = $otherCA;
        $this->totalCA = $totalCA;

        $this->fixedAssetsNCA = $fixedAssetsNCA;
        $this->depreciationNCA = $depreciationNCA;
        $this->totalNCA = $totalNCA;
    }

    public function view(): View
    {
        return view('Finance_Apps.export.balanceSheetReport', [
            'cashCA'                => $this->cashCA,
            'accountsReceivableCA'  => $this->accountsReceivableCA,
            'suppliesCA'            => $this->suppliesCA,
            'otherCA'               => $this->otherCA,
            'totalCA'               => $this->totalCA,
            'fixedAssetsNCA'        => $this->fixedAssetsNCA,
            'depreciationNCA'       => $this->depreciationNCA,
            'totalNCA'              => $this->totalNCA,
            'totalAsset'            => $this->totalAsset,
            'dateStart'             => $this->dateStart,
            'dateEnd'               => $this->dateEnd
        ]);
    }
}
