<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
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
//     return view('ticket.index');
// });


// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dash');
Route::post('/', [TicketController::class, 'doPostTicket'])->name('PostTicket');
