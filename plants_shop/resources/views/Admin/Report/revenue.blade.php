@extends('Admin.layouts.app')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h4 class="mb-0">Lọc Doanh Thu</h4>
    </div>
    <hr />
    <form method="GET" action="{{ route('admin.reports.revenue') }}" class="mb-4">
        <div class="form-row align-items-end">
            <div class="col-md-3">
                <label for="start_date">Từ ngày:</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
            </div>
            <div class="col-md-3">
                <label for="end_date">Đến ngày:</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
            </div>
            <div class="col-md-3 align-self-end mt-3">
                <button type="submit" class="btn btn-primary btn-block">Lọc</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kết quả doanh thu</h5>
            <p class="card-text">Doanh thu từ {{ \Carbon\Carbon::parse($startDate)->format('d/m/Y') }} đến
                {{ \Carbon\Carbon::parse($endDate)->format('d/m/Y') }}: <strong>{{ number_format($revenue) }} VND</strong>
            </p>
        </div>
    </div>
@endsection
