<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\MatchingController;

// Registration and Login Routes
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protecting the Home Route with Auth Middleware
    Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('questionnaire/{id}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::post('/questionnaire', 'QuestionnaireController@store')->name('questionnaire.store');
    Route::get('matching', [MatchingController::class, 'index'])->name('matching.index');
});

// Route to return the correct URL for the store route
Route::get('questionnaire-store-url', function () {
    return response()->json(['url' => route('questionnaire.store')]);
})->name('questionnaire.store.url');

// Catch-all route
Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');
