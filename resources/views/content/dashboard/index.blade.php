@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    @vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
    @vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row gy-6">
        <!-- Transactions -->
        <div class="col-lg-10">
            <div class="card h-100">
                <div class="card-header">
                    <h4 class="mb-0">Statistik Data Bulan Ini</h4>
                </div>
                <div class="card-body pt-lg-10">
                    <div class="row g-6">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow-xs">
                                        <i class="ri-group-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Pelanggan Baru</p>
                                    <h5 class="mb-0">{{ $customer_count }} Orang</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow-xs">
                                        <i class="ri-car-fill ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Total Mobil Masuk</p>
                                    <h5 class="mb-0">{{ $car_count }} Mobil</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow-xs">
                                        <i class="ri-money-dollar-circle-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Pendapatan</p>
                                    <h5 class="mb-0">@rupiahCurrency($earning)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>
@endsection
