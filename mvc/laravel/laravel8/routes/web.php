<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function () {
    return view('v1');
});

Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n', '[0-9]+');

Route::get('contact', function() {
    return "C'est moi le contact.";
});
use App\Http\Controllers\WelcomeController;
Route::get('/', [WelcomeController::class, 'index']);
use App\Http\Controllers\ArticleController;
Route::get('article/{n}', [ArticleController::class, 'show'])->where('n', '[0-9]+')->name('moeh');
use App\Http\Controllers\PhotoController;
Route::get('photo', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);
Route::get('/test-contact', function () {
    return new App\Mail\Contact([
        'nom' => 'Durand',
        'email' => 'durand@chezlui.com',
        'message' => 'Je voulais vous dire que votre site est magnifique !'
    ]);
});
use App\Http\Controllers\ContactController;
Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);
