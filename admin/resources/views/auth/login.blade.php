<x-auth-layout title="Login">
    <h4 class="fw-semibold mb-3 fs-18">Log in to your account</h4>

    <form method="POST" action="{{ route('login') }}" class="text-start mb-3">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control"
                placeholder="Enter your password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="d-flex justify-content-between mb-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin">
                <label class="form-check-label" for="checkbox-signin">Remember me</label>
            </div>

            <a href="{{ route('password.request') }}" class="text-muted border-bottom border-dashed">Forget
                Password</a>
        </div>

        <div class="d-grid">
            <button class="btn btn-primary fw-semibold" type="submit">Login</button>
        </div>
    </form>
</x-auth-layout>
