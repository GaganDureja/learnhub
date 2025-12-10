@php
    $encryptedId = encrypt($item->id);
    $supportsSoftDeletes = method_exists($item, 'trashed');
@endphp

@can($permissionName . '-edit')
    <!-- Edit -->
    <a href="{{ route("{$routeName}.edit", $encryptedId) }}" class="btn btn-sm btn-primary" title="Edit">
        <i class="ti ti-edit fs-3"></i>
    </a>
@endcan
@if ($supportsSoftDeletes && !$item->trashed())
    @can($permissionName . '-delete')
        <!-- Soft Delete -->
        <form action="{{ route("{$routeName}.destroy", $encryptedId) }}" method="POST" class="d-inline confirm-action"
            data-text="This will delete the item!">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                <i class="ti ti-trash fs-3"></i>
            </button>
        </form>
    @endcan
@elseif(!$supportsSoftDeletes)
    @can($permissionName . '-delete')
        <!-- Soft Delete -->
        <form action="{{ route("{$routeName}.destroy", $encryptedId) }}" method="POST" class="d-inline confirm-action"
            data-text="This will delete the item!">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                <i class="ti ti-trash fs-3"></i>
            </button>
        </form>
    @endcan
@elseif($supportsSoftDeletes)
    @can($permissionName . '-restore')
        <!-- Restore -->
        <form action="{{ route("{$routeName}.restore", $encryptedId) }}" method="POST" class="d-inline confirm-action"
            data-text="This will restore the item!">
            @csrf
            <button type="submit" class="btn btn-sm btn-success" title="Restore">
                <i class="ti ti-refresh fs-3"></i>
            </button>
        </form>
    @endcan

    @can($permissionName . '-force-delete')
        <!-- Permanent Delete -->
        <form action="{{ route("{$routeName}.forceDelete", $encryptedId) }}" method="POST" class="d-inline confirm-action"
            data-text="This will permanently delete the item!">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-dark" title="Force Delete">
                <i class="ti ti-trash-off fs-3"></i>
            </button>
        </form>
    @endcan
@endif
