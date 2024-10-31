<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee) {
            return redirect()->back()->withErrors([
                'email' => 'El correo especificado no existe.'
            ])->withInput($request->only('email'));
        }

        if (Hash::check($request->password, $employee->password)) {
            Auth::login($employee);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'La contraseña es incorrecta.'
            ])->withInput($request->only('email'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}