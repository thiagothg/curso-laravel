<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Middleware\LogAccessMidleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('locale', function () {
    // Validate
    $validated = request()->validate([
        'language' => ['required'],
    ]);
    // Set locale
    App::setLocale($validated['language']);
    // Session
    session()->put('locale', $validated['language']);
    // Response
    return redirect()->back();
});

Route::get('principal', [LandingController::class, 'index'])->name('site.index');
Route::get('about', [AboutController::class, 'index'])->name('site.about');
Route::get('contact', [ContactController::class, 'index'])->name('site.contact');
Route::post('contact', [ContactController::class, 'save'])->name('site.contact');


// Route::resource('produto', ProdutoController::class);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::get()
    Route::prefix('app')->group(function () {
        Route::get('clients', [ClientController::class, 'index'])->name('app.clients');

        Route::get('supliers', [SupplierController::class, 'index'])->name('app.supliers');
        Route::post('supliers/search', [SupplierController::class, 'index'])->name('app.supliers.search');
        Route::get('supliers/new', [SupplierController::class, 'new'])->name('app.supliers.new');
        Route::post('supliers/new', [SupplierController::class, 'new'])->name('app.supliers.new');
        Route::get('supliers/edit/{id}/{msg?}', [SupplierController::class, 'editar'])->name('app.supliers.edit');




        Route::get('products', [ProductController::class, 'index'])->name('app.products');
    });
});

//fallback
// Route::fallback(function() {
//     return 'fail!';
// });