<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KabinetController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CabinetGroupController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('user.home', [
        'title' => 'PPI Kastamonu - Beranda',
        'blogs' => App\Models\Blog::latest()->take(3)->get(),
    ]);
});

Route::get('/profile', function () {
    return view('user.profile', [
        'title' => 'PPI Kastamonu - Profil Pengembang'
    ]);
});

Route::get('/tentang', function () {
    return view('user.about', [
        'title' => 'PPI Kastamonu - Tentang Kami'
    ]);
});

Route::get('/aktivitas', function () {
    return view('user.activity', [
        'title' => 'PPI Kastamonu - Kegiatan Kami',
        'activities' => App\Models\Activity::orderBy('created_at', 'desc')->paginate(5),
    ]);
});

Route::get('/blog', [BlogController::class, 'indexUser'])
    ->name('blog.index.user');

Route::get('/kontak', [ContactController::class, 'index'])
    ->name('contact.index');

Route::post('/kontak/send', [ContactController::class, 'send'])
    ->name('contact.send');


Route::get('/kastulis', [AuthorController::class, 'listPosts'])
    ->name('posts.index.user');

Route::get('/penulisan/{post}', [AuthorController::class, 'show'])
    ->name('posts.show');

Route::get('/author/{author}', [AuthorController::class, 'profile'])
    ->name('author.profile');

Route::get('/blog/{blog}', [BlogController::class, 'show'])
    ->name('blog.show');

Route::get('/aktivitas/{activity}', [ActivityController::class, 'show'])
    ->name('activity.show');

Route::get('/kabinet', [KabinetController::class, 'index'])
    ->name('kabinet.index');

Route::get('/kabinet/list', [KabinetController::class, 'list'])
    ->name('kabinet.list');

Route::get('/kabinet/{cabinet}', [KabinetController::class, 'show'])
    ->name('kabinet.show');

Route::get('/galeri', [GalleryController::class, 'index'])
    ->name('gallery.index');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])
        ->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->get('/dashboard', [AdminController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |------------------------------------------------------
        | BLOG
        |------------------------------------------------------
        */

        Route::resource('blog', BlogController::class);

        /*
        |------------------------------------------------------
        | ACTIVITY
        |------------------------------------------------------
        */

        Route::resource('activity', ActivityController::class);

        /*
        |------------------------------------------------------
        | POSTS (KASTULIS)
        |------------------------------------------------------
        */

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

        /*
        |------------------------------------------------------
        | AUTHORS
        |------------------------------------------------------
        */

        Route::get('penulis', [AuthorController::class, 'indexAuthor'])
            ->name('posts.index_author');

        Route::get('penulis/create', [AuthorController::class, 'createAuthor'])
            ->name('posts.create_author');

        Route::post('penulis', [AuthorController::class, 'storeAuthor'])
            ->name('posts.store_author');

        Route::get('penulis/{author}/edit', [AuthorController::class, 'editAuthor'])
            ->name('posts.edit_author');

        Route::put('penulis/{author}', [AuthorController::class, 'updateAuthor'])
            ->name('posts.update_author');

        Route::delete('penulis/{author}', [AuthorController::class, 'destroyAuthor'])
            ->name('posts.destroy_author');

        /*
        |------------------------------------------------------
        | CABINET
        |------------------------------------------------------
        */

        Route::resource('cabinets', CabinetController::class);

        /*
        |------------------------------------------------------
        | MEMBERS
        |------------------------------------------------------
        */

        Route::get('cabinets/{cabinet}/members/create', [MemberController::class, 'create'])
            ->name('members.create');

        Route::post('cabinets/{cabinet}/members', [MemberController::class, 'store'])
            ->name('members.store');

        Route::get('cabinets/{cabinet}/members/{member}/edit', [MemberController::class, 'edit'])
            ->name('members.edit');

        Route::put('cabinets/{cabinet}/members/{member}', [MemberController::class, 'update'])
            ->name('members.update');

        Route::delete('cabinets/{cabinet}/members/{member}', [MemberController::class, 'destroy'])
            ->name('members.destroy');


        /*
        |------------------------------------------------------
        | GROUP
        |------------------------------------------------------
        */

        Route::get('cabinets/{cabinet}/groups/create',
            [CabinetGroupController::class,'create'])
            ->name('groups.create');

        Route::post('cabinets/{cabinet}/groups',
            [CabinetGroupController::class,'store'])
            ->name('groups.store');

        Route::get('groups/{group}/edit',
            [CabinetGroupController::class,'edit'])
            ->name('groups.edit');

        Route::put('groups/{group}',
            [CabinetGroupController::class,'update'])
            ->name('groups.update');

        Route::delete('groups/{group}',
            [CabinetGroupController::class,'destroy'])
            ->name('groups.destroy');


        /*
        |------------------------------------------------------
        | DIVISION
        |------------------------------------------------------
        */

        Route::get('cabinets/{cabinet}/divisions', [DivisionController::class, 'index'])
            ->name('divisions.index');

        Route::get('cabinets/{cabinet}/divisions/create', [DivisionController::class, 'create'])
            ->name('divisions.create');

        Route::post('cabinets/{cabinet}/divisions', [DivisionController::class, 'store'])
            ->name('divisions.store');

        Route::get('divisions/{division}/edit', [DivisionController::class, 'edit'])
            ->name('divisions.edit');

        Route::put('divisions/{division}', [DivisionController::class, 'update'])
            ->name('divisions.update');

        Route::delete('divisions/{division}', [DivisionController::class, 'destroy'])
            ->name('divisions.destroy');
    });
