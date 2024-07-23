<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Lấy ngày hiện tại
        $today = Carbon::now();

        // Lấy ngày bắt đầu và kết thúc cho ngày hiện tại
        $currentDayStart = $today->copy()->startOfDay();
        $currentDayEnd = $today->copy()->endOfDay();

        // Lấy ngày bắt đầu và kết thúc cho tháng hiện tại
        $currentMonthStart = $today->copy()->startOfMonth();
        $currentMonthEnd = $today->copy()->endOfMonth();

        // Lấy ngày bắt đầu và kết thúc cho năm hiện tại
        $currentYearStart = $today->copy()->startOfYear();
        $currentYearEnd = $today->copy()->endOfYear();

        // Lấy danh sách đơn hàng đã hoàn thành trong ngày, tháng và năm hiện tại
        $dailyOrders = $this->getCompletedOrders($currentDayStart, $currentDayEnd);
        $monthlyOrders = $this->getCompletedOrders($currentMonthStart, $currentMonthEnd);
        $yearlyOrders = $this->getCompletedOrders($currentYearStart, $currentYearEnd);

        // Tính tổng doanh thu từ danh sách đơn hàng
        $dailyRevenue = $this->calculateRevenue($dailyOrders);
        $monthlyRevenue = $this->calculateRevenue($monthlyOrders);
        $yearlyRevenue = $this->calculateRevenue($yearlyOrders);

        return view('Admin.report.index', compact(
            'dailyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'currentDayStart',
            'currentDayEnd',
            'currentMonthStart',
            'currentMonthEnd',
            'currentYearStart',
            'currentYearEnd'
        )
        );
    }


    public function getCompletedOrders($startDate, $endDate)
    {
        return Order::where('status', '4')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();
    }

    public function calculateRevenue($orders)
    {
        return $orders->sum('totalPrice');
    }

    public function revenue(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

            // Lấy danh sách đơn hàng đã hoàn thành trong khoảng thời gian
        $orders = $this->getCompletedOrders($startDate, $endDate);

            // Tính tổng doanh thu từ danh sách đơn hàng
        $revenue = $this->calculateRevenue($orders);

        return view('Admin.report.revenue', compact('revenue', 'startDate', 'endDate'));
    }
}
