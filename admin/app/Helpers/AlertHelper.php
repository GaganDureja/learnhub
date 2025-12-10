<?php

namespace App\Helpers;

class AlertHelper
{
    /**
     * Create a new class instance.
     */
    public static function flash($title, $message, $icon = 'info')
    {
        session()->flash('swal', [
            'title' => $title,
            'message' => $message,
            'icon' => $icon
        ]);
    }
}
