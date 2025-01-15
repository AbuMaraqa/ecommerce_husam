<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\EditCategory;
use App\Livewire\Categories\ListCategory;
use App\Livewire\Home\Index;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleList;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\EditUser;
use App\Livewire\Users\ListUsers;
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

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', Index::class)->name('home');

Route::group(['middleware' => 'auth'], function () {
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
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

