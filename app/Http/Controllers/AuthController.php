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
    // funcion para redicionar a la pagina de Twitter (x) y poder validar credenciales
    public function redirect()
    {
        //se llama al paquete socialite para redireccionar a twitter
        return Socialite::driver('twitter')->redirect();
        // return Socialite::driver('telegram')->redirect();
    }

    // funcionar para llamar a la api de twitter y validar credenciales
    public function callback()
    {
        // se utiliza try catch para capturar errores de la autenticación
        try {
            // se crea una varible para capturar la información de la autenticación
            $user = Socialite::driver('twitter')->user();
            // $user = Socialite::driver('telegram')->user();
            // dd($user);

            // se crea una variable para verificar si el usuario ya existe
            $existingUser = User::where('email', $user->getEmail())->first();

            // se crea una variable para crear un usuario si no existe
            if ($existingUser) {
                $createdUser = $existingUser;
            } else {
                // se crea una variable para crear un usuario
                $createdUser = User::create([
                    // se crea una variable para capturar el nombre del usuario
                    'name' => $user->getName(),
                    // se crea una variable para capturar el correo del usuario
                    'email' => $user->getEmail(),
                    // Considera añadir una contraseña por defecto si es necesario
                    // 'password' => Hash::make(Str::random(16)),
                ]);
            }

            // auth()->login($createdUser);


            // se autentica al usuario
            Auth::login($createdUser);

            // se redirecciona al usuario a la pagina de inicio
            return redirect('/dashboard');
        } catch (\Exception $e) {
            // se captura el error
            Log::error('Error en la autenticación de GitHub: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Hubo un problema al autenticarte. Por favor, intenta de nuevo.');
        }
    }
}
