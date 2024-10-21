<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Scrapping\ScrapeController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\CagnotteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
});

Route::get('/politique-confidentialite', function () {
    return view('politique-confidentialite');
});


// routes/web.php


// Route::get('/showBy/{uuid}', [ListeController::class, 'showBySlug'])->name('liste.showBySlug');


Route::post('/liste/{uuid}/participate', [ListeController::class, 'participate'])->name('liste.participate');

// Route::get('/participer', function () {
//     return view('participer');
// });

// Stripe checkout routes
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', [StripeController::class, 'checkout'])->name('liste.showBySlug');
    // Route::get('/{liste}', [StripeController::class, 'checkout'])->name('checkout');
    Route::get('/{uuid}', [ListeController::class, 'showBySlug'])->name('liste.showBySlug');
    Route::post('/{liste}', [StripeController::class, 'checkoutPost'])->name('liste.showBySlug.post');
    // Route::get('success', [StripeController::class, 'success'])->name('success');
    // Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');
});

// Route pour les webhooks Stripe
Route::post('stripe/webhook', [StripeWebhookController::class, 'handleWebhook']);


Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Route::post('liste/{id}/contribute', [ListeController::class, 'contribute'])->name('liste.contribute');
Route::post('list/{id}/transfer', [TransferController::class, 'requestTransfer'])->name('list.transfer.request');
// Route pour afficher la page de paiement


// Route pour la page de succès de paiement
Route::get('payment/success', [StripeController::class, 'success'])->name('success');

// Route pour la page d'annulation de paiement
Route::get('payment/cancel', [StripeController::class, 'cancel'])->name('cancel');


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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/product/add/{title}', [DashboardController::class, 'addProductWish'])->name('dashboard.addProductWish');
    Route::delete('/product/delete/', [DashboardController::class, 'deleteProductWish'])->name('dashboard.deleteProductWish');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::resource('/admin/users', ProfileController::class);
    // Route::resource('/admin/listes', ListeController::class);
    Route::resource('/admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
    Route::resource('/admin/listes', ListeController::class)->names([
        'index' => 'admin.listes.index',
        'create' => 'admin.listes.create',
        'store' => 'admin.listes.store',
        'show' => 'admin.listes.show',
        'edit' => 'admin.listes.edit',
        'update' => 'admin.listes.update',
        'destroy' => 'admin.listes.destroy',
    ]);
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__ . '/auth.php';
