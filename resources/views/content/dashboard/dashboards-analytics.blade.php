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
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Transactions</h5>
                        <div class="dropdown">
                            <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-line ri-24px"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                <a class="dropdown-item" href="javascript:void(0);">Update</a>
                            </div>
                        </div>
                    </div>
                    <p class="small mb-0"><span class="h6 mb-0">Total 48.5% Growth</span> 😎 this month</p>
                </div>
                <div class="card-body pt-lg-10">
                    <div class="row g-6">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-primary rounded shadow-xs">
                                        <i class="ri-pie-chart-2-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Sales</p>
                                    <h5 class="mb-0">245k</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-success rounded shadow-xs">
                                        <i class="ri-group-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Customers</p>
                                    <h5 class="mb-0">12.5k</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-warning rounded shadow-xs">
                                        <i class="ri-macbook-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Product</p>
                                    <h5 class="mb-0">1.54k</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <div class="avatar-initial bg-info rounded shadow-xs">
                                        <i class="ri-money-dollar-circle-line ri-24px"></i>
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-0">Revenue</p>
                                    <h5 class="mb-0">$88k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Transactions -->

        <!-- Total Earnings -->
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Total Earning</h5>
                    <div class="dropdown">
                        <button class="btn text-muted p-0" type="button" id="totalEarnings" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ri-more-2-line ri-24px"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarnings">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-lg-8">
                    <div class="mb-5 mb-lg-12">
                        <div class="d-flex align-items-center">
                            <h3 class="mb-0">$24,895</h3>
                            <span class="text-success ms-2">
                                <i class="ri-arrow-up-s-line"></i>
                                <span>10%</span>
                            </span>
                        </div>
                        <p class="mb-0">Compared to $84,325 last year</p>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-6">
                            <div class="avatar flex-shrink-0 bg-lightest rounded me-3">
                                <img src="{{ asset('assets/img/icons/misc/zipcar.png') }}" alt="zipcar">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Zipcar</h6>
                                    <p class="mb-0">Vuejs, React & HTML</p>
                                </div>
                                <div>
                                    <h6 class="mb-2">$24,895.65</h6>
                                    <div class="progress bg-label-primary" style="height: 4px;">
                                        <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-6">
                            <div class="avatar flex-shrink-0 bg-lightest rounded me-3">
                                <img src="{{ asset('assets/img/icons/misc/bitbank.png') }}" alt="bitbank">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Bitbank</h6>
                                    <p class="mb-0">Sketch, Figma & XD</p>
                                </div>
                                <div>
                                    <h6 class="mb-2">$8,6500.20</h6>
                                    <div class="progress bg-label-info" style="height: 4px;">
                                        <div class="progress-bar bg-info" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 bg-lightest rounded me-3">
                                <img src="{{ asset('assets/img/icons/misc/aviato.png') }}" alt="aviato">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Aviato</h6>
                                    <p class="mb-0">HTML & Angular</p>
                                </div>
                                <div>
                                    <h6 class="mb-2">$1,2450.80</h6>
                                    <div class="progress bg-label-secondary" style="height: 4px;">
                                        <div class="progress-bar bg-secondary" style="width: 75%" role="progressbar"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Total Earnings -->

        <!-- Sales by Countries -->
        <div class="col-xl-4 col-md-6">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Sales by Countries</h5>
                    <div class="dropdown">
                        <button class="btn text-muted p-0" type="button" id="saleStatus" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ri-more-2-line ri-24px"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="saleStatus">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-4">
                                <div class="avatar-initial bg-label-success rounded-circle">US</div>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <h6 class="mb-0">$8,656k</h6>
                                    <i class="ri-arrow-up-s-line ri-24px text-success"></i>
                                    <span class="text-success">25.8%</span>
                                </div>
                                <p class="mb-0">United states of america</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">894k</h6>
                            <small class="text-muted">Sales</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-4">
                                <span class="avatar-initial bg-label-danger rounded-circle">UK</span>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <h6 class="mb-0">$2,415k</h6>
                                    <i class="ri-arrow-down-s-line ri-24px text-danger"></i>
                                    <span class="text-danger">6.2%</span>
                                </div>
                                <p class="mb-0">United Kingdom</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">645k</h6>
                            <small class="text-muted">Sales</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-4">
                                <span class="avatar-initial bg-label-warning rounded-circle">IN</span>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <h6 class="mb-0">865k</h6>
                                    <i class="ri-arrow-up-s-line ri-24px text-success"></i>
                                    <span class="text-success"> 12.4%</span>
                                </div>
                                <p class="mb-0">India</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">148k</h6>
                            <small class="text-muted">Sales</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <div class="avatar me-4">
                                <span class="avatar-initial bg-label-secondary rounded-circle">JA</span>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <h6 class="mb-0">$745k</h6>
                                    <i class="ri-arrow-down-s-line ri-24px text-danger"></i>
                                    <span class="text-danger">11.9%</span>
                                </div>
                                <p class="mb-0">Japan</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">86k</h6>
                            <small class="text-muted">Sales</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="avatar me-4">
                                <span class="avatar-initial bg-label-danger rounded-circle">KO</span>
                            </div>
                            <div>
                                <div class="d-flex align-items-center gap-1 mb-1">
                                    <h6 class="mb-0">$45k</h6>
                                    <i class="ri-arrow-up-s-line ri-24px text-success"></i>
                                    <span class="text-success">16.2%</span>
                                </div>
                                <p class="mb-0">Korea</p>
                            </div>
                        </div>
                        <div class="text-end">
                            <h6 class="mb-1">42k</h6>
                            <small class="text-muted">Sales</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Sales by Countries -->

        <!-- Data Tables -->
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th class="text-truncate">User</th>
                                <th class="text-truncate">Email</th>
                                <th class="text-truncate">Role</th>
                                <th class="text-truncate">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
                                            <small class="text-truncate">@amiccoo</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">susanna.Lind57@gmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                                        <span>Admin</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
                                            <small class="text-truncate">@brossiter15</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">estelle.Bailey10@gmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                        <span>Editor</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
                                            <small class="text-truncate">@bemblinf</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">milo86@hotmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-computer-line text-danger ri-22px me-2"></i>
                                        <span>Author</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bertha Biner</h6>
                                            <small class="text-truncate">@bbinerh</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">lonnie35@hotmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                        <span>Editor</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/4.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
                                            <small class="text-truncate">@bkrabbe1d</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">ahmad_Collins@yahoo.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-pie-chart-2-line ri-22px text-info me-2"></i>
                                        <span>Maintainer</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
                                            <small class="text-truncate">@brosebothamz</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">tillman.Gleason68@hotmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-edit-box-line text-warning ri-22px me-2"></i>
                                        <span>Editor</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Bree Kilday</h6>
                                            <small class="text-truncate">@bkildayr</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">otho21@gmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-3-line ri-22px text-success me-2"></i>
                                        <span>Subscriber</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-success rounded-pill">Active</span></td>
                            </tr>
                            <tr class="border-transparent">
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-4">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <div>
                                            <h6 class="mb-0 text-truncate">Breena Gallemore</h6>
                                            <small class="text-truncate">@bgallemore6</small>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-truncate">florencio.Little@hotmail.com</td>
                                <td class="text-truncate">
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-3-line ri-22px text-success me-2"></i>
                                        <span>Subscriber</span>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-secondary rounded-pill">Inactive</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Data Tables -->
    </div>
@endsection
