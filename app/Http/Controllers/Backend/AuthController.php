<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function Pest\Laravel\json;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in using the 'admin' guard
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->intended(route('products.index'));
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->withInput($request->only('email'));
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
    }
}
