<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/compra/nueva', [\App\Http\Controllers\PurchaseController::class, 'postBuy'])->name('purchase.new');

    Route::get('/facturas', [\App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/facturas/generar', [\App\Http\Controllers\InvoiceController::class, 'generate'])->name('invoice.generate');
    Route::get('/facturas/{invoice}', [\App\Http\Controllers\InvoiceController::class, 'show'])->name('invoice.show');

});

require __DIR__.'/auth.php';
