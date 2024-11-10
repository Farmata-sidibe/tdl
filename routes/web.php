<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Scrapping\ScrapeController;
use App\Http\Controllers\ListeController;
use App\Http\Controllers\ListeAdminController;
use App\Http\Controllers\CagnotteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

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

Route::get('/generate-sitemap', function() {
    $sitemap = Sitemap::create();

    // Ajouter la page d'accueil
    $sitemap->add(Url::create('/')
        ->setPriority(1.0)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY));

    $sitemap->add(Url::create('/product')
        ->setPriority(0.8)
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));

    $sitemap->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap généré avec succès!';
});

Route::get('/', function () {
    $data = [
        'title' => 'Préparez l\'Arrivée de Bébé : Listes de nNaissance, Contributions et Réservations',
        'metaDescription' => 'Préparez l’arrivée de bébé en toute sérénité ! Créez, partagez et personnalisez votre liste de naissance avec des options de réservation et de contributions libres. Offrez à vos proches une façon unique de vous soutenir.'
    ];
    return view('home', $data);
});


Route::group(['prefix' => 'liste'], function () {
    $data = [
        'title' => 'Offrez un Cadeau Spécial pour Bébé : Accédez à la Liste de Naissance',
        'metaDescription' => 'Participez à l’arrivée de bébé en contribuant ou réservant un cadeau personnalisé. Accédez facilement à la liste de naissance, découvrez les souhaits des futurs parents et faites plaisir en offrant le cadeau parfait !'
    ];
    Route::get('/{uuid}', [CagnotteController::class, 'showBySlug'])->name('liste.showBySlug', $data);
    Route::post('/{uuid}/contribution', [CagnotteController::class, 'store'])->name('liste.contribute', $data);
    Route::get('/payment/success/{participantId}', [CagnotteController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/cancel/{participantId}', [CagnotteController::class, 'paymentCancel'])->name('payment.cancel');
});

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::group(['prefix' => 'product'], function () {
    $data = [
        'title' => 'Trouvez les Produits Essentiels pour Votre Bébé',
        'metaDescription' => 'Découvrez une sélection de produits pour votre liste de naissance, avec options de réservation et de contributions pour faciliter vos choix.'
    ];
    Route::get('/', [ScrapeController::class, 'fetchData'])->name('product', $data);
});

Route::group(['prefix' => 'cagnotte'], function () {
    Route::get('/', [CagnotteController::class, 'index'])->name('cagnotte.cagnotte');

});
// Route::resource('liste', ListeController::class);


Route::middleware(['auth', 'verified'])->group(function () {
    $data = [
        'title' => 'Suivez et Gérez Votre Liste de Naissance',
        'metaDescription' => 'Accédez à votre tableau de bord personnalisé : gérez vos listes de naissance, suivez les contributions, et organisez facilement vos souhaits pour bébé. Simplifiez la gestion de vos réservations et suivez l’évolution de votre cagnotte en un seul endroit.'
    ];
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard', $data);
    Route::post('/product/add/{title}', [DashboardController::class, 'addProductWish'])->name('dashboard.addProductWish', $data);
    Route::delete('/product/delete/', [DashboardController::class, 'deleteProductWish'])->name('dashboard.deleteProductWish', $data);
    Route::post('/dashboard/cagnotte/update-total-amount', [DashboardController::class, 'updateTotalAmount'])->name('dashboard.updateTotalAmount', $data);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::put('/profile', [ProfileController::class, 'updateListe'])->name('profile.updateListe');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('/admin/users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'show' => 'admin.users.show',
        'destroy' => 'admin.users.destroy',
    ]);
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::patch('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');

    Route::resource('/admin/listes', ListeAdminController::class)->names([
        'index' => 'admin.listes.index',
        'create' => 'admin.listes.create',
        'store' => 'admin.listes.store',
        'show' => 'admin.listes.show',
        'edit' => 'admin.listes.edit',
        'update' => 'admin.listes.update',
        'destroy' => 'admin.listes.destroy',
    ]);
});
// vérification si l'email de paypal est déjà enregistrée
Route::post('/save-paypal-email', [DashboardController::class, 'savePayPalEmail'])->name('savePayPalEmail');

Route::get('/mentions-legales', function () {
    return view('mentions-legales');
});

Route::get('/politique-confidentialite', function () {
    return view('politique-confidentialite');
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




