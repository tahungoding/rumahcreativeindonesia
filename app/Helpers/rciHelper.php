<?php

use Illuminate\Support\Facades\Storage;

function profile_picture($path = null)
{
    return ($path) ? Storage::url($path) : asset('assets/back/images/logo-sm.png');
}
