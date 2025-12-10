<?php

function canAccessModule($module)
{
    return auth()->user()->can("$module-list")
        || auth()->user()->can("$module-create")
        || auth()->user()->can("$module-edit")
        || auth()->user()->can("$module-delete")
        || auth()->user()->can("$module-restore")
        || auth()->user()->can("$module-force-delete");
}
