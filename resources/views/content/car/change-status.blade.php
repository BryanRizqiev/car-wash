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
                    <h5 class="mb-0">Edit Status</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('car.update.status', $car->id) }}" method="POST">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label" for="basic-default-status">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="basic-default-status" name="status" aria-label="Status">
                                    @foreach ($status as $sts)
                                        @if ($sts === $car->status)
                                            <option value="{{ $sts }}" selected>{{ $sts }}</option>
                                        @else
                                            <option value="{{ $sts }}">{{ $sts }}</option>
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
                                <a href="{{ route('car') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
