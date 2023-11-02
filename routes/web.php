<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', function () {
    $failedTrans = DB::table("transactions")->where("status","failed")->count();
    $successTrans = DB::table("transactions")->where("status","success")->count();
    $sumTrans = DB::table("transactions")->where("status","failed")->sum("amount");
    $sumTransSuccess = DB::table("transactions")->where("status","success")->sum("amount");
    $allbookings = DB::table("booking")->count();
    $todayBookings = DB::table("booking")->whereDate("booking_date", date("Y-m-d"))->count();
    return view('dashboard',[
        "allBooking" => $allbookings,
        "todayBooking" => $todayBookings,
        "failedTrans" => $failedTrans,
        "sumTrans" => $sumTrans,
        "successTrans" => $successTrans,
        "sumTransSuccess" => $sumTransSuccess,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bookings', function () {
    return view('booking');
})->middleware(['auth', 'verified'])->name('bookings');

Route::get('/transactions', function () {
    return view('transaction');
})->middleware(['auth', 'verified'])->name('transactions');

Route::get('/logout', function () {
    Auth::logout();
    return redirect("/");
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
