<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| GUEST (BELUM LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {


    Route::get('/login',
        [AuthController::class, 'index']
    )->name('login');


    Route::post('/auth',
        [AuthController::class, 'auth']
    )->name('auth');


});



/*
|--------------------------------------------------------------------------
| AUTH (SUDAH LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {



    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN & KASIR
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard',
        [DashboardController::class, 'index']
    )
    ->middleware('role:admin,kasir')
    ->name('dashboard');





    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout',
        [AuthController::class, 'logout']
    )
    ->name('logout');






    /*
    |--------------------------------------------------------------------------
    | ADMIN ONLY
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {


            // CRUD USER
            Route::resource(
                'users',
                UserController::class
            );


        });







    /*
    |--------------------------------------------------------------------------
    | ADMIN & KASIR
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin,kasir')
        ->group(function () {



            /*
            |--------------------------------------------------------------------------
            | PRODUK, ITEM PENJUALAN & JENIS
            |--------------------------------------------------------------------------
            */

            Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'produk',
            ProdukController::class
        );

        Route::resource(
            'itempenjualan',
            ItemPenjualanController::class
        );

        Route::resource('jenis', JenisController::class)
            ->parameters([
                'jenis' => 'jenis',
            ]);
    });






            /*
            |--------------------------------------------------------------------------
            | PENJUALAN
            |--------------------------------------------------------------------------
            */

            // TAMBAHKAN ROUTE STRUK DI SINI (SEBELUM ATAU SESUDAH RESOURCE)
            Route::get('penjualan/{penjualan}/struk', [PenjualanController::class, 'struk'])
                ->name('admin.penjualan.struk');


            Route::resource(
                'penjualan',
                PenjualanController::class
            )
            ->names([


                'index' =>
                'admin.penjualan.index',


                'create' =>
                'admin.penjualan.create',


                'store' =>
                'admin.penjualan.store',


                'show' =>
                'admin.penjualan.show',


                'edit' =>
                'admin.penjualan.edit',


                'update' =>
                'admin.penjualan.update',


                'destroy' =>
                'admin.penjualan.destroy',


            ]);



        });



});