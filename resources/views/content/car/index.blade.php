@extends('layouts/contentNavbarLayout')

@section('title', 'Car')

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')
    <div class="row gy-6">

        @include('shared.alert')

        <div class="card-body">
            <div class="demo-inline-spacing">
                <a href="{{ route('car.new') }}" class="btn btn-success">Buat Baru</a>
            </div>
        </div>

        <div class="card">
            <div class="d-inline"></div>
            <h5 class="card-header d-inline">Daftar Mobil</h5>
            <div class="card-header demo-inline-spacing d-inline">
                <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">Status</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?status=Belum Selesai">Belum Selesai</a></li>
                        <li><a class="dropdown-item" href="?status=Menunggu Pembayaran">Menunggu Pembayaran</a></li>
                        <li><a class="dropdown-item" href="?status=Selesai">Selesai</a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nopol</th>
                            <th>Pemilik</th>
                            <th>Warna Mobil</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Masuk Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $car->nopol }}</td>
                                <td>{{ $car->customer->name }}</td>
                                <td>{{ $car->car_colour }}</td>
                                <td>@rupiahCurrency($car->price)</td>
                                <td>{{ $car->status }}</td>
                                <td>{{ $car->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="ri-more-2-line"></i></button>
                                        <div class="dropdown-menu">
                                            <a href="{{ route('car.edit', $car->id) }}" class="dropdown-item"
                                                href="javascript:void(0);"><i class="ri-file-edit-line me-1"></i> Edit</a>

                                            <a href="{{ route('car.edit.status', $car->id) }}" class="dropdown-item"
                                                href="javascript:void(0);"><i class="ri-pencil-line me-1"></i> Ubah
                                                Status</a>

                                            <form action="{{ route('car.delete', $car->id) }}" method="POST">
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
