<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CurrentAsset;
use App\Models\NonCurrentAsset;
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
        return view('Finance_Apps.pages.report.balanceSheet');
    }

    public function getCAandNCA($month)
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

    public function addCAandNCA(Request $request)
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

    public function updateCAandNCA(Request $request)
    {
        // Get data
        $caID = $request->input('caID');
        $ncaID = $request->input('ncaID');
        $current_asset = CurrentAsset::where('id', $caID)->first();
        $non_current_asset = NonCurrentAsset::where('id', $ncaID)->first();

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
}
