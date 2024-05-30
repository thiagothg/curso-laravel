<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\App;

require __DIR__ . '/auth.php';

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route::get()  Route::resource('products', ProductController::class); 
    Route::resource('task', TaskController::class);
    Route::get('tasks/export',  [TaskController::class, 'export'])->name('task.export');

    Route::get('task/exportacao/{extensao}',  [TaskController::class, 'exportacao'])->name('task.exportacao');
});

//fallback
// Route::fallback(function() {
//     return 'fail!';
// });
