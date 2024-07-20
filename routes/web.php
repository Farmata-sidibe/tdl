<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Scrapping\ScrapeController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\CagnotteController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;



use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/blog', function () {
    return view('blog');
});

// routes/web.php


// Route::get('/showBy/{uuid}', [ListeController::class, 'showBySlug'])->name('liste.showBySlug');


Route::post('/liste/{uuid}/participate', [ListeController::class, 'participate'])->name('liste.participate');

// Route::get('/participer', function () {
//     return view('participer');
// });

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Route pour afficher la page de paiement
Route::get('checkout', [StripeController::class, 'checkout'])->name('liste.showBySlug');
Route::get('/liste/{uuid}', [ListeController::class, 'showBySlug'])->name('liste.showBySlug');

// Route pour traiter le paiement
Route::post('checkout', [StripeController::class, 'checkoutPost'])->name('liste.showBySlug.post');

// Route pour la page de succès de paiement
Route::get('payment/success', [StripeController::class, 'success'])->name('success');

// Route pour la page d'annulation de paiement
Route::get('payment/cancel', [StripeController::class, 'cancel'])->name('cancel');

// Route pour les webhooks Stripe
Route::post('stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);



Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ScrapeController::class, 'fetchData'])->name('product');
});

Route::get('/params', function () {
    return view('params');
});

Route::group(['prefix' => 'cagnotte'], function () {
    Route::get('/', [CagnotteController::class, 'index'])->name('cagnotte.cagnotte');
    Route::get('/active-cagnotte', [CagnotteController::class, 'active'])->name('cagnotte.active-cagnotte');
});
Route::resource('listes', ListeController::class);

// Route::resource('cagnotte', CagnotteController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'indexListe'])->name('dashboard');
    Route::post('/product/add/{title}', [DashboardController::class, 'addProductWish'])->name('dashboard.addProductWish');
    Route::delete('/product/delete/', [DashboardController::class, 'deleteProductWish'])->name('dashboard.deleteProductWish');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
