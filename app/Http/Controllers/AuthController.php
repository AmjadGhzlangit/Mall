<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

    $data = $request->only('email', 'password');

    $user = null;
    if ($data['email']) {
        $user = User::where('email', $data['email'])->first();
    }
    $request->session()->regenerate();
    if ($user && $user->is_admin) {
        return redirect()->route('admin.orders.index');
    } else {
        // Adjust this route according to your cashier dashboard route
        return redirect()->route('cashier.dashboard');
    }
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home'); 
    }
}

