@session('success')
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endsession

@session('error')
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ $value }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endsession
