@extends('layouts/contentNavbarLayout')

@section('title', 'Customer')

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
                    <h5 class="mb-0">Edit Pelanggan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe"
                                    name="name" value="{{ $customer->name }}" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-address">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-address"
                                    placeholder="Jln. Semeru 123 Pare" name="address" value="{{ $customer->address }}"
                                    required />
                            </div>
                        </div>
                        <div class="row
                                    mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" id="basic-default-phone" class="form-control phone-mask"
                                    placeholder="085123456789" aria-label="085123456789"
                                    aria-describedby="basic-default-phone" name="phone_number"
                                    value="{{ $customer->phone_number }}" />
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
                                <a href="{{ route('customer') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
