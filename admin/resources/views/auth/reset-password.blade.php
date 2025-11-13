<x-auth-layout>
    <h4 class="fw-semibold mb-2 fs-20">Create New Password</h4>


    <form method="POST" action="{{ route('password.store') }}" class="text-start mb-3">
        @csrf
        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                :value="old('email', $request->email)" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Create New Password <small class="text-info ms-1">Must be at
                    least 8 characters</small></label>
            <input type="password" id="password" name="password" class="form-control"
                placeholder="New Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="password_confirmation">Reenter New Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                placeholder="Reenter Password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mb-2 d-grid">
            <button class="btn btn-primary fw-semibold" type="submit">Create New Password</button>
        </div>
    </form>

    <p class="text-muted fs-14 mb-0">
        Back To <a href="{{ url('/') }}" class="fw-semibold text-danger ms-1">Login !</a>
    </p>
</x-auth-layout>
