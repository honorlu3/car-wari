<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //mostrar formulario de registro
    public function showRegisterForm(){
        return view('auth.register');
    }
    // guardaar usuario
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

    // Crear el usuario
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
        'role' => 'user', // Asignar el rol por defecto
    ]);

    //redirigir a la pagina de login con mensaje de exito 0 resgister.form
    return redirect()->route('login.form')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }

    //mostrar formulario de login
    public function showLoginForm(){
        return view('auth.login');  
    }

    //procesar login
    public function login(Request $request){
        // Validar datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar login
        if (Auth::attempt($credentials, true)) { // true para recordar al usuario
            $request->session()->regenerate(); // proteger contra ataques de sesión
            // Redirigir según el rol
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin')->with('success', 'Bienvenido al panel de administración 👑');
            } else {
                return redirect()->intended('/')->with('success', 'Has iniciado sesión correctamente ✅');  
            }
        }
        // Si falla
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ])->onlyInput('email');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Sesión cerrada correctamente ✅');
    
    }

    
}
