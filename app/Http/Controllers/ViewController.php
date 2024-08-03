<?php

namespace App\Http\Controllers;

use App\Mail\CCMail;
use App\Models\CostOfGoodsSold;
use App\Models\Division;
use App\Models\Employee;
use App\Models\GeneralAdminCost;
use App\Models\Histories;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderReport;
use App\Models\SellingServiceExpenses;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ViewController extends Controller
{
    // Authentication functions

    public function ccSubmit(Request $request)
    {
        // Mail::send('mail.CCMail', [
        //     'fullname' => $request->fullname,
        //     'email'    => $request->email,
        //     'subject'  => $request->subject,
        //     'msg'      => $request->msg
        // ], function ($mail) use ($request) {
        //     $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
        //     $mail->to("nadnad10.nz@gmail.com")->subject('Call Center Message');
        // });

        $data = [
            'fullname' => $request->fullname,
            'email'    => $request->email,
            'subject'  => $request->subject,
            'msg'      => $request->msg
        ];
        Mail::to('receiver@gmail.com')->send(new CCMail($data));
        return 'Terimakasih sudah menghubungi kami!';

        // return view('auth.CC');
    }

    // Dashboard functions
    public function dashboardHR()
    {
        $totalEmployee = Employee::count();
        $totalDivision = Division::count();
        $totalInactive = Histories::count();
        return view('HR_Apps.website.dashboardHR', compact('totalEmployee', 'totalDivision', 'totalInactive'));
    }

    public function dashboardInven()
    {
        return view('Inventory_Apps.website.dashboardInven');
    }

    public function dashboardSales()
    {
        // Akumulasi order bulanan
        $order = Order::where('user_id', Auth::user()->id)
            ->whereMonth('order_date', Carbon::now()->month)
            ->whereNotNull('delivery_number')
            ->get();

        // Akumulasi order
        $orderDetail = Order::where('user_id', Auth::user()->id)->get();

        // Akumulasi total order
        $totalOrder = Order::where('user_id', Auth::user()->id)
            ->whereNotNull('delivery_number')->count();

        // Akumulasi total order bulanan
        $totalOrderMonthly = count($order);
        $orderReport = OrderReport::where('user_id', Auth::user()->id)->get();

        // Akumulasi total penjualan
        $totalSales = 0;
        foreach ($orderDetail as $data1) {
            foreach ($data1->orderDetail as $data2) {
                if ($data1->orderStatus->order_status != "Cancel") {
                    $totalSales += $data2->total_price;
                }
            }
        }

        // Akumulasi total penjualan perbulan
        $totalSalesMonthly = 0;
        foreach ($order as $data1) {
            foreach ($data1->orderDetail as $data2) {
                if ($data1->orderStatus->order_status != "Cancel") {
                    $totalSalesMonthly += $data2->total_price;
                }
            }
        }

        // Mendapatkan data pesanan untuk setahun terakhir
        $lastYearOrders = Order::where('user_id', Auth::user()->id)
            ->whereYear('order_date', Carbon::now()->year)
            ->whereNotNull('delivery_number')
            ->get();

        // Buat array kosong untuk menyimpan total sales tiap bulan
        $totalSalesMonthlyArray = array_fill(0, 12, 0);

        // Lakukan looping pada data pesanan setahun terakhir
        foreach ($lastYearOrders as $data1) {
            foreach ($data1->orderDetail as $data2) {
                if ($data1->orderStatus->order_status != "Cancel") {
                    // Ambil bulan dari tanggal pesanan
                    $month = Carbon::parse($data1->order_date)->month;
                    // Tambahkan total sales pesanan ke bulan yang bersangkutan dalam array
                    $totalSalesMonthlyArray[$month - 1] += $data2->total_price;
                }
            }
        }

        return view('Sales_Apps.pages.dashboardSales', compact('totalSales', 'totalSalesMonthly', 'totalOrder', 'totalOrderMonthly', 'orderReport', 'totalSalesMonthlyArray'));
    }

    public function dashboardFinance()
    {
        $user = Auth::user();
        $year = date("Y");

        // Akumulasi total profit
        $sales = OrderDetail::select('order_details.*', 'orders.order_date')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->whereYear('orders.order_date', '=', $year)
            ->get();
        $totalSales = 0;

        foreach ($sales as $sale) {
            $totalSales += $sale->total_price;
        }

        // Akumulasi total loss
        // COGS
        $cogs = CostOfGoodsSold::where('user_id', $user->id)
            ->whereYear('created_at', '=', $year)
            ->get();
        $totalCOGS = 0;

        foreach ($cogs as $data) {
            $totalCOGS += ($data->raw_material + $data->manpower + $data->factory_overhead);
        }

        // SSE
        $sse = SellingServiceExpenses::where('user_id', $user->id)
            ->whereYear('created_at', '=', $year)
            ->get();
        $totalSSE = 0;

        foreach ($sse as $data) {
            $totalSSE += ($data->adm_ecommerce + $data->marketing_salary + $data->marketing_operations + $data->other_cost);
        }

        // GAC
        $gac = GeneralAdminCost::where('user_id', $user->id)
            ->whereYear('created_at', '=', $year)
            ->get();
        $totalGAC = 0;

        foreach ($gac as $data) {
            $totalGAC += ($data->salaries_and_allowances + $data->electricity_and_water + $data->transportation + $data->communication + $data->office_stationery + $data->consultant + $data->cleanliness_and_security + $data->maintenance_and_renovation + $data->depreciation + $data->tax + $data->other_cost);
        }

        $totalLoss = ($totalCOGS + $totalSSE + $totalGAC);
        $totalProfit = $totalSales - $totalLoss;

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

        // HPP
        $hpp = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($cogs as $data) {
                if ($data->month == $i) {
                    $hpp[] = ($data->raw_material + $data->manpower + $data->factory_overhead);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $hpp[] = null;
            }
        }

        // SSE
        $sse2 = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($sse as $data) {
                if ($data->month == $i) {
                    $sse2[] = ($data->adm_ecommerce + $data->marketing_salary + $data->marketing_operations + $data->other_cost);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $sse2[] = null;
            }
        }

        // GAC
        $gac2 = [];
        for ($i = 1; $i <= 12; $i++) {
            $found = false;

            foreach ($gac as $data) {
                if ($data->month == $i) {
                    $gac2[] = ($data->salaries_and_allowances + $data->electricity_and_water + $data->transportation + $data->communication + $data->office_stationery + $data->consultant + $data->cleanliness_and_security + $data->maintenance_and_renovation + $data->depreciation + $data->tax + $data->other_cost);
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $gac2[] = null;
            }
        }

        // Buat array kosong untuk menyimpan total net income tiap bulan
        $totalNetMonthlyArray = array_fill(0, 12, 0);

        // Iterasi untuk setiap bulan
        for ($i = 1; $i <= 12; $i++) {
            $month = str_pad($i, 2, '0', STR_PAD_LEFT);

            // Hitung net income untuk bulan tertentu
            $net = $salesMonth[$month] ? ($salesMonth[$month] - $hpp[$i - 1] - $sse2[$i - 1] - $gac2[$i - 1]) : 0;

            // Tambahkan nilai net income ke total net income sebelumnya
            if ($i == 1) {
                $totalNetMonthlyArray[$i - 1] = $net;
            } else {
                $totalNetMonthlyArray[$i - 1] = $totalNetMonthlyArray[$i - 2] + $net;
            }
        }

        return view('Finance_Apps.pages.dashboardFinance', compact('user', 'totalProfit', 'totalLoss', 'totalNetMonthlyArray'));
    }

    // Profile functions
    public function profile()
    {
        return view('HR_Apps.website.myProfile');
    }

    public function profileInven()
    {
        return view('Inventory_Apps.website.myProfileInven');
    }

    public function editProfile()
    {
        return view('HR_Apps.website.editProfile');
    }

    public function editProfileInven()
    {
        return view('Inventory_Apps.website.editProfileInven');
    }

    public function getDownload($id)
    {
        $orderReport = OrderReport::find($id);
        if (Storage::disk('report')->exists($orderReport->report)) {
            return response()->download(storage_path('/app/public/report_file/' . $orderReport->report));
        }

        return redirect()->back();
    }
}
