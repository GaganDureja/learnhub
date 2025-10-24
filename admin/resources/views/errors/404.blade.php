<x-auth-layout title="404 - Page Not Found">
    <div class="text-center">
        <h1 class="text-error">404</h1>
        <h3 class="mt-3 mb-2">Page not Found</h3>
        <p class="text-muted mb-3">It's looking like you may have taken a wrong turn. Don't
            worry... it happens to
            the best of us. You might want to check your internet connection. Here's a little
            tip that might
            help you get back on track.</p>

        <a href="{{ url('/') }}" class="btn btn-danger">
            <i class="ti ti-home fs-16 me-1"></i> Back to Home
        </a>
    </div>
</x-auth-layout>