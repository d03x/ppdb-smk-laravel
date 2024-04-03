<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

abstract class Controller
{
    /**
     * Undocumented function.
     */
    public function __construct()
    {
        if (!Cache::get('user:current')) {
            Cache::set('user:current', auth()->user(), now()->addSeconds(30));
        }
        $user = Cache::get('user:current');
        view()->share('user', $user);
    }
}
