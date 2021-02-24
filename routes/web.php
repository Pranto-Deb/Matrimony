<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UpdateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');

Route::group(['prefix' => 'admin', 'middleware'=>['auth:sanctum', 'admin']], function(){
	Route::get('/dashboard', [DashboardController::class,'admin_dashboard'])->name('admin.dashboard');

	Route::group(['prefix' => '/user'], function(){
		Route::get('/', [UserController::class,'index'])->name('admin.user');
		Route::get('/create', [UserController::class,'create'])->name('create.user');
		Route::post('/store', [UserController::class,'store'])->name('store.user');
		Route::get('/show/{id}', [UserController::class,'show'])->name('show.user');
		Route::get('/status-update/{id}/{status}', [UserController::class,'updateStatus'])->name('update.status');
		Route::get('/edit/{id}', [UserController::class,'edit'])->name('edit.user');
		Route::put('/update/{id}', [UserController::class,'update'])->name('update.user');
		Route::get('/delete/{id}', [UserController::class,'delete'])->name('delete.user');		
	});

	Route::group(['prefix' => '/manager'], function(){
		Route::get('/', [ManagerController::class,'index'])->name('admin.manager');
		Route::get('/create', [ManagerController::class,'create'])->name('create.manager');
		Route::post('/store', [ManagerController::class,'store'])->name('store.manager');
		Route::get('/edit/{id}', [ManagerController::class,'edit'])->name('edit.manager');
		Route::put('/update/{id}', [ManagerController::class,'update'])->name('update.manager');
		Route::get('/delete/{id}', [ManagerController::class,'delete'])->name('delete.manager');
	});

});

Route::group(['prefix' => 'manager','middleware'=>['auth:sanctum', 'manager']],function(){

	Route::get('/dashboard', [DashboardController::class, 'manager_dashboard'])->name('manager.dashboard');

	Route::group(['prefix' => '/user'], function(){
		Route::get('/', [UserController::class,'index'])->name('manager.user');
		Route::get('/create', [UserController::class,'create'])->name('manager.create.user');
		Route::post('/store', [UserController::class,'store'])->name('manager.store.user');
		Route::get('/show/{id}', [UserController::class,'show'])->name('manager.show.user');
		Route::get('/status-update/{id}/{status}', [UserController::class,'updateStatus'])->name('manager.update.status');
		Route::get('/edit/{id}', [UserController::class,'edit'])->name('manager.edit.user');
		Route::put('/update/{id}', [UserController::class,'update'])->name('manager.update.user');		
	});
});

Route::group(['prefix' => '/user', 'middleware'=>['auth:sanctum', 'user']], function(){
	Route::get('/dashboard', [DashboardController::class, 'user_dashboard'])->name('customer.dashboard');
	Route::get('/search', [CustomerController::class, 'search'])->name('search');
	Route::get('/proposal/{id}', [CustomerController::class, 'proposal'])->name('send.proposal');
	Route::get('/proposal', [CustomerController::class, 'sendProposal'])->name('user.proposals');
	Route::get('/cancel/request/{id}', [CustomerController::class, 'cancel'])->name('cancel.request');
	Route::get('/proposal/accept/{id}', [CustomerController::class, 'acceptProposal'])->name('accept.request');
	Route::get('/proposal/reject/{id}', [CustomerController::class, 'reject'])->name('reject.request');
	Route::put('/update/profile', [UpdateController::class, 'updateProfile'])->name('update.profile');
	Route::put('/update/password', [UpdateController::class, 'updatePassword'])->name('update.password');
});
