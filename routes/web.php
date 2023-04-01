<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth'] ], function () {
    Route::get('/posts', [PostController::class , 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class , 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class , 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class , 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class , 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class , 'destroy'])->name('posts.destroy');
});

// Comments Route
Route::post('/comments',[CommentController::class,'store'] )->name('comments.store');
Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/{service}', function ($service) {
    if ($service == 'github') {
        return Socialite::driver('github')->redirect();
    }
    elseif ($service == 'google') {
        return Socialite::driver('google')->redirect();
    }
})->name('service');

Route::get('/auth/callback/github', function () {

    $githubUser = Socialite::driver('github')->user();
    $user = User::updateOrCreate([
        'service_user_id' => $githubUser->id, // here the ORM will check if this id exists in my database, if exists it wil update it
    ], [    // if not exists it will create it
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'service_token' => $githubUser->token,
        'service_refresh_token' => $githubUser->refreshToken,
    ]);
    Auth::login($user); // Here we say that the user is logedin in the system
    return redirect()->route('posts.index');
});

Route::get('/auth/callback/google', function () {

    $googleUser = Socialite::driver('google')->user();
    $user = User::updateOrCreate([
        'service_user_id' => $googleUser->id, // here the ORM will check if this id exists in my database, if exists it wil update it
    ], [    // if not exists it will create it
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'service_token' => $googleUser->token,
        'service_refresh_token' => $googleUser->refreshToken,
    ]);
    Auth::login($user); // Here we say that the user is logedin in the system
    return redirect()->route('posts.index');
});
