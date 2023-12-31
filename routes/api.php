<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/fetch_today_booking', [BookingController::class, "index"]);
Route::get('/filter_all_booking/{fromDate}/{toDate}', [BookingController::class, "filterAllBooking"]);
Route::get('/all_booking', [BookingController::class, "allBooking"]);
Route::get('/upcoming_booking', [BookingController::class, "upcomingBooking"]);
Route::get('/transactions', [TransactionController::class, "index"]);
Route::get('/has_visited/{id}', [BookingController::class, "checkVisit"]);
Route::post('/send_message', [BookingController::class, "sendMessage"]);
