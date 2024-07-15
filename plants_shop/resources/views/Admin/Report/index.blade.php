@extends('Admin.layouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Quản Lý Doanh Thu</h4>
        <a href="{{ route('admin.reports.revenue') }}" class="btn btn-sm btn-success">Lọc doanh thu</a>
    </div>
    <hr />

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3>Doanh Thu Trong Ngày</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Từ ngày {{ $currentDayStart->format('d/m/Y') }} đến hết ngày {{ $currentDayEnd->format('d/m/Y') }}</p>
                    <h5 class="card-title">{{ number_format($dailyRevenue) }} VND</h5>
                </div>
            </div>
        </div>
    
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h3>Doanh Thu Trong Tháng</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Từ ngày {{ $currentMonthStart->format('d/m/Y') }} đến ngày {{ $currentMonthEnd->format('d/m/Y') }}</p>
                    <h5 class="card-title">{{ number_format($monthlyRevenue) }} VND</h5>
                </div>
            </div>
        </div>
    
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h3>Doanh Thu Trong Năm</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Từ ngày {{ $currentYearStart->format('d/m/Y') }} đến ngày {{ $currentYearEnd->format('d/m/Y') }}</p>
                    <h5 class="card-title">{{ number_format($yearlyRevenue) }} VND</h5>
                </div>
            </div>
        </div>
    </div>
    
@endsection
