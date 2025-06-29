<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Profile Management
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');

    // Skills Management
    Route::get('/skills', [DashboardController::class, 'skills'])->name('skills');
    Route::post('/skills', [DashboardController::class, 'storeSkill'])->name('skills.store');
    Route::put('/skills/{skill}', [DashboardController::class, 'updateSkill'])->name('skills.update');
    Route::delete('/skills/{skill}', [DashboardController::class, 'destroySkill'])->name('skills.destroy');

    // Services Management
    Route::get('/services', [DashboardController::class, 'services'])->name('services');
    Route::post('/services', [DashboardController::class, 'storeService'])->name('services.store');
    Route::put('/services/{service}', [DashboardController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [DashboardController::class, 'destroyService'])->name('services.destroy');

    // Portfolio Management
    Route::get('/portfolio', [DashboardController::class, 'portfolio'])->name('portfolio');
    Route::post('/portfolio', [DashboardController::class, 'storePortfolio'])->name('portfolio.store');
    Route::put('/portfolio/{portfolio}', [DashboardController::class, 'updatePortfolio'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [DashboardController::class, 'destroyPortfolio'])->name('portfolio.destroy');

    // Blog Management
    Route::get('/blog', [DashboardController::class, 'blog'])->name('blog');
    Route::post('/blog', [DashboardController::class, 'storeBlog'])->name('blog.store');
    Route::put('/blog/{blog}', [DashboardController::class, 'updateBlog'])->name('blog.update');
    Route::delete('/blog/{blog}', [DashboardController::class, 'destroyBlog'])->name('blog.destroy');

    // Testimonials Management
    Route::get('/testimonials', [DashboardController::class, 'testimonials'])->name('testimonials');
    Route::post('/testimonials', [DashboardController::class, 'storeTestimonial'])->name('testimonials.store');
    Route::put('/testimonials/{testimonial}', [DashboardController::class, 'updateTestimonial'])->name('testimonials.update');
    Route::delete('/testimonials/{testimonial}', [DashboardController::class, 'destroyTestimonial'])->name('testimonials.destroy');

    // Messages Management
    Route::get('/messages', [DashboardController::class, 'messages'])->name('messages');
    Route::post('/messages/{message}/reply', [DashboardController::class, 'replyMessage'])->name('messages.reply');
    Route::delete('/messages/{message}', [DashboardController::class, 'destroyMessage'])->name('messages.destroy');

    // Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    Route::post('/settings', [DashboardController::class, 'updateSettings'])->name('settings.update');
});

require __DIR__.'/auth.php';
