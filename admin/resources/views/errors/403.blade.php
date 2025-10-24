<x-auth-layout title="404 - Page Not Found">
    <div class="text-center">
        <h1 class="text-error">403</h1>
        <h3 class="mt-3 mb-2">Access Denied !</h3>
        <p class="text-muted mb-3">You are not authorized to view this page. If you think this is a mistake, please
            contact support for assistance.</p>

        <a href="{{ url('/') }}" class="btn btn-danger">
            <i class="ti ti-home fs-16 me-1"></i> Back to Home
        </a>
    </div>
</x-auth-layout>
