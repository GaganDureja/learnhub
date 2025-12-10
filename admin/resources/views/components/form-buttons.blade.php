<div class="d-flex justify-content-center gap-3 mt-4">
    <button type="submit" class="btn btn-success px-4">
        <i class="fa fa-save me-1"></i> {{ $save }}
    </button>

    <a href="{{ route('dashboard') }}" class="btn btn-danger px-4">
        <i class="fa fa-arrow-left me-1"></i> {{ $cancel }}
    </a>
</div>
