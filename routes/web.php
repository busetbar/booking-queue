<?php

use App\Http\Controllers\CustomerController;
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
Route::get('/dash', [DashboardController::class, 'index'])->name('dash');

// Login
Route::get('/', [CustomerController::class, 'viewInput'])->name('login');
Route::post('/', [CustomerController::class, 'doInput'])->name('dologin');

//Tickets
Route::post('/post', [TicketController::class, 'doPostTicket'])->name('PostTicket');
Route::get('/detail', [TicketController::class, 'viewDetailTicket'])->name('detail');
