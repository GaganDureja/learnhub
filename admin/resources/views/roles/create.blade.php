<x-structure>
    <x-header title="Create Role" />

    <div class="container py-4">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Role Name</label>
                <input type="text" name="name" class="form-control" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Permissions</label>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="perm{{ $permission->id }}">
                                <label class="form-check-label" for="perm{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <x-form-buttons />
        </form>
    </div>

    <x-footer />
</x-structure>
