<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\KabinetController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;

// User Routes

Route::get('/', function () {
    $title = 'PPI Kastamonu - Beranda';
    return view('user.home', compact('title'));
});

Route::get('/tentang', function () {
    $title = 'PPI Kastamonu - Tentang Kami';
    return view('user.about', compact('title'));
});

Route::get('/aktivitas', function () {
    $title = 'PPI Kastamonu -  Kegiatan Kami';
    $activities = App\Models\Activity::all();
    return view('user.activity', compact('title', 'activities'));
});

Route::get('/kabinet', [KabinetController::class, 'index']);

Route::get('penulisan/{post}', [AuthorController::class, 'show'])
        ->name('posts.show');

Route::get('/kastulis', [AuthorController::class, 'listPosts']);

Route::get('/aktivitas/{activity}', [ActivityController::class, 'show']);

Route::get('/kabinet/list', [KabinetController::class, 'list'])->name('kabinet.list');
Route::get('/kabinet/{cabinet}', [KabinetController::class, 'show'])->name('kabinet.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Admin Routes
Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    

    Route::resource('activity', ActivityController::class);

    Route::get('penulisan', [AuthorController::class, 'index'])
        ->name('posts.index');

    Route::get('penulisan/create', [AuthorController::class, 'create'])
        ->name('posts.create');

    Route::post('penulisan', [AuthorController::class, 'store'])
        ->name('posts.store');

    Route::get('penulisan/{post}/edit', [AuthorController::class, 'edit'])
        ->name('posts.edit');

    Route::put('penulisan/{post}', [AuthorController::class, 'update'])
        ->name('posts.update');

    Route::delete('penulisan/{post}', [AuthorController::class, 'destroy'])
        ->name('posts.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', AuthorController::class);
    });
    
    Route::resource('cabinets', CabinetController::class);
    Route::get('cabinets/{cabinet}/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('cabinets/{cabinet}/members', [MemberController::class, 'store'])->name('members.store');
    Route::get('cabinets/{cabinet}/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
    Route::put('cabinets/{cabinet}/members/{member}', [MemberController::class, 'update'])->name('members.update');
    Route::delete('cabinets/{cabinet}/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');

    Route::get('/cabinets/{cabinet}/divisions', [DivisionController::class, 'index'])->name('divisions.index');
    Route::get('/cabinets/{cabinet}/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
    Route::post('/cabinets/{cabinet}/divisions', [DivisionController::class, 'store'])->name('divisions.store');

    Route::get('/divisions/{division}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::put('/divisions/{division}', [DivisionController::class, 'update'])->name('divisions.update');
    Route::delete('/divisions/{division}', [DivisionController::class, 'destroy'])->name('divisions.destroy');

    Route::get('/admin/cabinets/{cabinet}', [CabinetController::class, 'show'])
    ->name('admin.cabinets.show');

});









