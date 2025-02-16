<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Modelo de usuario (asegúrate de que exista)
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener una vista llamada 'login.blade.php'
    }

    /**
     * Maneja el inicio de sesión del usuario.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate(); // Regenera la sesión para seguridad
            return redirect()->intended('/dashboard'); // Redirige al dashboard o a la URL anterior
        }

        throw ValidationException::withMessages([
            'email' => ['Credenciales inválidas'],
        ]);
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión del usuario actual
        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF
        return redirect('/login'); // Redirige al formulario de inicio de sesión
    }

    /**
     * Muestra el formulario de registro.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de tener una vista llamada 'register.blade.php'
    }

    /**
     * Maneja el registro de un nuevo usuario.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashea la contraseña
        ]);

        // Inicia sesión automáticamente después del registro
        Auth::attempt($request->only('email', 'password'));

        return redirect('/dashboard')->with('success', 'Registro exitoso');
    }
}