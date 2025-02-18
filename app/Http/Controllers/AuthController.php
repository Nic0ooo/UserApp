<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    // Affiche le formulaire de connexion (sauf si il est déja connecté)
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('tasks.index'); 
        }
        return view('auth.login');
    }

    // Affiche le formulaire d'inscription (sauf si il est déja connecté)
    public function registerForm()
    {
        if (Auth::check()) {
            return redirect()->route('tasks.index'); 
        }
        return view('auth.register');
    }

    // Gère la connexion
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/tasks');
        }

        return back()->withErrors([
            'email' => 'Les identifiants ne correspondent pas.',
        ]);
    }

    // Déconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Gère l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/tasks')->with('status', 'Votre compte a été créé avec succès et vous êtes maintenant connecté.');
    }
}
