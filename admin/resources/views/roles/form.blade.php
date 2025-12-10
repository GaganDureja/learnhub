<div class="row g-2">
    <div class="col-md-4">
        <div class="form-floating">
            <input type="text" class="form-control" id="role" name="name" placeholder="Instructor"
                value="{{ old('name', isset($role) ? $role->name : '') }}" required>
            <label for="role">Role Name</label>
        </div>
    </div>

    <div class="col-md-8">
        <label class="form-label mb-2">Permissions</label>
        <div class="mb-2">
            <button type="button" class="btn btn-sm btn-primary mt-1 me-1" id="selectAllPermissions">Select All</button>
            <button type="button" class="btn btn-sm btn-secondary mt-1 me-1" id="unselectAllPermissions">Unselect
                All</button>
            <button type="button" class="btn btn-sm btn-success mt-1 me-1" data-action="create">Check All Create</button>
            <button type="button" class="btn btn-sm btn-info mt-1 me-1" data-action="view">Check All View/Read</button>
            <button type="button" class="btn btn-sm btn-warning mt-1 me-1" data-action="update">Check All Update</button>
            <button type="button" class="btn btn-sm btn-danger mt-1 me-1" data-action="delete">Check All Delete</button>
            <button type="button" class="btn btn-sm btn-warning mt-1 me-1" data-action="restore">Check All Restore</button>
            <button type="button" class="btn btn-sm btn-dark mt-1 me-1" data-action="force-delete">Check All Force
                Delete</button>
        </div>

        @foreach ($permissions->groupBy('group') as $groupName => $groupPermissions)
            <div class="card mb-2">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <strong>{{ $groupName }}</strong>
                    <div>
                        <input type="checkbox" class="form-check-input select-all-group"
                            data-group="{{ Str::slug($groupName) }}" id="selectAll{{ Str::slug($groupName) }}">
                        <label for="selectAll{{ Str::slug($groupName) }}">Select All</label>
                    </div>
                </div>
                <div class="card-body row">
                    @foreach ($groupPermissions as $permission)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input group-{{ Str::slug($groupName) }}" type="checkbox"
                                    name="permissions[]" value="{{ $permission->id }}"
                                    data-name="{{ $permission->name }}" id="perm{{ $permission->id }}"
                                    @if (in_array($permission->id, old('permissions', isset($role) ? $role->permissions->pluck('id')->toArray() : []))) checked @endif>
                                <label class="form-check-label" for="perm{{ $permission->id }}">
                                    {{ ucwords(str_replace(['-', '_'], ' ', $permission->name)) }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // --- Select all per group ---
        const selectAllBoxes = document.querySelectorAll('.select-all-group');
        selectAllBoxes.forEach(function(selectAllBox) {
            const group = selectAllBox.dataset.group;
            selectAllBox.addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.group-' + group);
                checkboxes.forEach(cb => cb.checked = selectAllBox.checked);
            });
        });

        // --- Update group "Select All" dynamically ---
        @foreach ($permissions->groupBy('group') as $groupName => $groupPermissions)
            (function() {
                const groupSlug = "{{ Str::slug($groupName) }}";
                const groupCheckboxes = document.querySelectorAll('.group-' + groupSlug);
                const selectAllBox = document.getElementById('selectAll' + groupSlug);

                groupCheckboxes.forEach(cb => {
                    cb.addEventListener('change', function() {
                        selectAllBox.checked = Array.from(groupCheckboxes).every(ch => ch
                            .checked);
                    });
                });
            })();
        @endforeach

        // --- Global Select All / Unselect All ---
        const allPermissions = document.querySelectorAll('input[name="permissions[]"]');

        document.getElementById('selectAllPermissions').addEventListener('click', function() {
            allPermissions.forEach(cb => cb.checked = true);
            document.querySelectorAll('.select-all-group').forEach(cb => cb.checked = true);
        });

        document.getElementById('unselectAllPermissions').addEventListener('click', function() {
            allPermissions.forEach(cb => cb.checked = false);
            document.querySelectorAll('.select-all-group').forEach(cb => cb.checked = false);
        });

        // --- Quick Action Buttons (create, view, delete, restore, force-delete) ---
        document.querySelectorAll('button[data-action]').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = btn.dataset.action.toLowerCase();

                allPermissions.forEach(cb => {
                    const name = cb.dataset.name ? cb.dataset.name.toLowerCase() : '';
                    if (!name) return; // skip if missing

                    switch (action) {
                        case 'create':
                            if (name.endsWith('create')) cb.checked = true;
                            break;
                        case 'view':
                            if (name.endsWith('list') || name.endsWith('view')) cb
                                .checked = true;
                            break;
                        case 'update':
                            if (name.endsWith('edit') || name.endsWith('update')) cb
                                .checked = true;
                            break;
                        case 'delete':
                            if (name.endsWith('delete') && !name.endsWith('restore') &&
                                !name.endsWith('force-delete')) cb.checked = true;
                            break;
                        case 'restore':
                            if (name.endsWith('restore')) cb.checked = true;
                            break;
                        case 'force-delete':
                            if (name.endsWith('force-delete')) cb.checked = true;
                            break;
                    }
                });

                // Update group "Select All" checkboxes
                document.querySelectorAll('.select-all-group').forEach(groupBox => {
                    const group = groupBox.dataset.group;
                    const groupCheckboxes = document.querySelectorAll('.group-' +
                        group);
                    groupBox.checked = Array.from(groupCheckboxes).every(ch => ch
                        .checked);
                });
            });
        });

    });
</script>
