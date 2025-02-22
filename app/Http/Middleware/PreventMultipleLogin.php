<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class PreventMultipleLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $currentSessionId = Session::getId();

           

         
            if (!$user->session_id) {
             
                $user->update(['session_id' => $currentSessionId]);
                return $next($request);
            }

       
            if ($user->session_id !== $currentSessionId) {
                sleep(1);
                $user->refresh();

                if ($user->session_id !== Session::getId()) {
                

                    Auth::logout();
                    return redirect('/login')->withErrors(['error' => 'Your session expired. Please log in again.']);
                }
            }
        }

        return $next($request);
    }
}
