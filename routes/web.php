<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/auth/callback', function () {
//     // $user = Socialite::driver('github')->userFromToken($token);

//     $githubUser = Socialite::driver('github')->user();

//     $user = User::updateOrCreate([
//         'github_id' => $githubUser->id,
//     ], [
//         'name' => $githubUser->name,
//         'email' => $githubUser->email,
//         'github_token' => $githubUser->token,
//         'github_refresh_token' => $githubUser->refreshToken,
//     ]);

//     Auth::login($user);

//     return redirect('/dashboard');
// });

// Route::get('/twitter/redirect', function () {
//     return Socialite::driver('twitter')->redirect();
// });

// Route::get('/twitter/callback', function () {
//     $user_twitter = Socialite::driver('twitter')->user();

//     dd($user_twitter);

//     $user = User::updateOrCreate([
//         'twitter' => $user_twitter->id,
//     ], [
//         'name' => $user_twitter->getName(),
//         'email' => $user_twitter->getEmail(),
//     ]);

//     Auth::login($user);

//     return redirect('/dashboard');

//     $user->token;
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// se crea una ruta para redireccionar a la pagina de twitter
Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
// se crea una ruta para llamar a la api de twitter y validar credenciales
Route::get('/auth/callback', [AuthController::class, 'callback'])->name('auth.callback');
