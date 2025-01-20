<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\EditCategory;
use App\Livewire\Categories\ListCategory;
use App\Livewire\Cities\CityCreate;
use App\Livewire\Cities\EditCity;
use App\Livewire\Cities\ListCity;
use App\Livewire\Home\Index;
use App\Livewire\Labels\CreateLabel;
use App\Livewire\Labels\EditLabel;
use App\Livewire\Labels\ListLabel;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleList;
use App\Livewire\Tags\CreateTag;
use App\Livewire\Tags\EditTag;
use App\Livewire\Tags\ListTag;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\EditUser;
use App\Livewire\Users\ListUsers;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', Index::class)->name('home');

    Route::group(['prefix'=>'users'],function (){
        Route::get('/', ListUsers::class)->name('users.index');
        Route::get('/create', CreateUser::class)->name('users.create');
        Route::get('/edit/{id}', EditUser::class)->name('users.edit');
    });
    Route::group(['prefix'=>'roles'],function (){
        Route::get('/', RoleList::class)->name('roles.index');
        Route::get('/create', RoleCreate::class)->name('roles.create');
    });
    Route::group(['prefix'=>'categories'],function (){
        Route::get('/', ListCategory::class)->name('category.index');
        Route::get('/create', CreateCategory::class)->name('category.create');
        Route::get('/edit/{id}', EditCategory::class)->name('category.edit');
    });
    Route::group(['prefix'=>'cities'],function (){
        Route::get('/', ListCity::class)->name('cities.index');
        Route::get('/create', CityCreate::class)->name('cities.create');
        Route::get('/edit/{id}', EditCity::class)->name('cities.edit');
    });
    Route::group(['prefix'=>'labels'],function (){
        Route::get('/', ListLabel::class)->name('labels.index');
        Route::get('/create', CreateLabel::class)->name('labels.create');
        Route::get('/edit/{id}', EditLabel::class)->name('labels.edit');
    });
    Route::group(['prefix'=>'tags'],function (){
        Route::get('/', ListTag::class)->name('tags.index');
        Route::get('/create', CreateTag::class)->name('tags.create');
        Route::get('/edit/{id}', EditTag::class)->name('tags.edit');
    });
});

Route::get('/migrate', function(){
    Artisan::call('migrate');
    dd('migrated!');
});


// require __DIR__.'/auth.php';
