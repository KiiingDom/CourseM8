<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionnaireController;

// Registration and Login Routes
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protecting the Home Route with Auth Middleware
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Questionnaire Routes
    Route::get('/questionnaire/{id}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::post('/questionnaire', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
});

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');
