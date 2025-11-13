<x--auth-layout title="Login">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h4 class="fw-semibold mb-3 fs-18">Reset Your Password</h4>

    <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to
        reset your password.</p>

    <form method="POST" action="{{ route('password.email') }}" class="text-start mb-3">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                :value="old('email')" required autofocus>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="d-grid">
            <button class="btn btn-primary fw-semibold" type="submit">Reset Password</button>
        </div>
    </form>

    <p class="text-muted fs-14 mb-0">
        Back To <a href="{{ route('login') }}" class="fw-semibold text-danger ms-1">Login !</a>
    </p>


</x-auth-layout>
