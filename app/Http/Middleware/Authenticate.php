<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
//        if (Auth::guard('deliveryBoy')){
//            return $request->expectsJson() ? null : route('delivery-boy.login');
//        }
        return $request->expectsJson() ? null : route('home');
    }
}
