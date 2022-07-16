<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/', [AuthenticatedSessionController::class, 'create'])
                ->name('login');
// Route::get('/', function () {
//     redirect('/login');
//     // return Inertia::render('Welcome', [
//     //     'canLogin' => Route::has('login'),
//     //     'canRegister' => Route::has('register'),
//     //     'laravelVersion' => Application::VERSION,
//     //     'phpVersion' => PHP_VERSION,
//     // ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contacts', function () {
    return Inertia::render('Contact');
})->middleware(['auth', 'verified'])->name('contacts');

require __DIR__.'/auth.php';
