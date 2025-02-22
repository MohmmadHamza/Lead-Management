<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
    
        $user = Auth::user();
        Session::start();
    
     
        $request->session()->regenerate();
        $currentSessionId = Session::getId(); 
    
    
        if ($user->session_id && $user->session_id !== $currentSessionId) {
          
            $user->update(['session_id' => $currentSessionId]);
    
          
            Auth::logoutOtherDevices($request->password);
        } else {
            $user->update(['session_id' => $currentSessionId]);
        }
    
        return redirect()->intended(route('dashboard', absolute: false));
    }
        

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
         $user = Auth::user();
    if ($user) {
        $user->update(['session_id' => null]); // Clear session ID
    }
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
