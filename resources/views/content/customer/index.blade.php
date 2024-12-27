@extends('layouts/contentNavbarLayout')

@section('title', 'Customer')

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row gy-6">

        @include('shared.alert')

        <div class="card-body">
            <div class="demo-inline-spacing">
                <a href="{{ route('customer.new') }}" class="btn btn-success">Buat Baru</a>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Daftar Pelanggan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Total Uang</th>
                            <th>Total Cuci</th>
                            <th>Cuci Terakhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($customers as $cust)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cust->name }}</td>
                                <td>{{ $cust->address }}</td>
                                <td>{{ $cust->phone_number }}</td>
                                <td>{{ $cust->money_spend }}</td>
                                <td>{{ $cust->wash_total }}</td>
                                <td>{{ $cust->last_wash_time }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('customer.edit', $cust->id) }}" class="dropdown-item"
                                                href="javascript:void(0);"><i class="ri-pencil-line me-1"></i> Edit</a>

                                            <form action="{{ route('customer.delete', $cust->id) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <i class="ri-delete-bin-6-line me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
