<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\TableChunk\TransferController;
use Illuminate\Support\Facades\Auth;
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

Route::get('pay', [PaymentController::class, 'showPayment']);
Route::post('process/payment', [PaymentController::class, 'procesPayment']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/migrate', [TransferController::class, 'transfer']);

Route::get('/sendNotification', [NotificationController::class, 'sendNotification']);
Route::get('/home/markRead/{id}', [HomeController::class, 'markRead']);


Route::get('sendEventRealtimeNotification', [HomeController::class, 'sendEventRealtimeNotification']);
