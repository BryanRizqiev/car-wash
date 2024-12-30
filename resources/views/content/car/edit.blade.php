@extends('layouts/contentNavbarLayout')

@section('title', 'Car')

@section('page-script')
    @vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')

    @include('shared.alert')

    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-6">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Cucian</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('car.update', $car->id) }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-nopol">Nopol</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-nopol" placeholder="AG 1111 GA"
                                    name="nopol" required value="{{ $car->nopol }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-car_colour">Warna Mobil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-car_colour" placeholder="Merah"
                                    name="car_colour" required value="{{ $car->car_colour }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-price">Harga</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-price" placeholder="25000"
                                    name="price" required value="{{ $car->price }}" />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-customer">Pilih Pelanggan</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="basic-default-customer" name="customer_id"
                                    aria-label="Pilih Pelanggan">
                                    @foreach ($customers as $cust)
                                        @if ($cust->id === $car->customer_id)
                                            <option value="{{ $cust->id }}" selected>{{ $cust->name }}</option>
                                        @else
                                            <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('car') }}" class="btn btn-warning">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
