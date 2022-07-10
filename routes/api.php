<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('contacts', [App\Http\Controllers\ContactController::class, 'allContacts']);
Route::post('contact', [App\Http\Controllers\ContactController::class, 'saveContact']);
Route::patch('contact/update/{id}', [App\Http\Controllers\ContactController::class, 'updateContact']);
Route::delete('contact/{id}/delete', [App\Http\Controllers\ContactController::class, 'deleteContact']);

Route::post('send/sms', [App\Http\Controllers\ContactController::class, 'sendSMSContact']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
