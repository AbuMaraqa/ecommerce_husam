<?php

use App\Livewire\Home\Index;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Roles\RoleList;
use App\Livewire\Users\CreateUser;
use App\Livewire\Users\ListUsers;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Commands\CreateRole;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', Index::class)->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'users'],function (){
        Route::get('/', ListUsers::class)->name('users.index');
        Route::get('/create', CreateUser::class)->name('users.create');
    });
    Route::group(['prefix'=>'roles'],function (){
        Route::get('/', RoleList::class)->name('roles.index');
        Route::get('/create', RoleCreate::class)->name('roles.create');
    });
});
