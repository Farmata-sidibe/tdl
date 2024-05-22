<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Scrapping\ScrapeController;
use App\Http\Controllers\ListeController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

// Route::get('/blog', function () {
//     return view('blog');
// });

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ScrapeController::class, 'fetchData'])->name('product');
});

Route::get('/params', function () {
    return view('params');
});
Route::resource('listes', ListeController::class);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/blog', [DashboardController::class, 'indexListe'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/profile', [ProfileController::class, 'listes'])->name('profile.edit');
    // Route::patch('profile/listes/{liste}', [ProfileController::class, 'updateListe'])->name('profile.updateListe');
});




require __DIR__ . '/auth.php';
