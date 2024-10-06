<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log; // Añade esta línea para usar Log
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function redirect()
    {
        // return Socialite::driver('github')->redirect();
        return Socialite::driver('twitter')->redirect();
    }

    public function callback()
    {
        try {
            // $user = Socialite::driver('github')->user();
            $user = Socialite::driver('twitter')->user();
            // dd($user);

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                $createdUser = $existingUser;
            } else {
                $createdUser = User::create ([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    // Considera añadir una contraseña por defecto si es necesario
                    // 'password' => Hash::make(Str::random(16)),
                ]);
            }

            // auth()->login($createdUser);
            Auth::login($createdUser);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            Log::error('Error en la autenticación de GitHub: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Hubo un problema al autenticarte. Por favor, intenta de nuevo.');
        }
    }
}
