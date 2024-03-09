<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TempTicketController;
use App\Http\Controllers\UserController;
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



Route::middleware(['check.username'])->group(function () {
    // Dashboard Customer
    Route::get('/dash', [DashboardController::class, 'index'])->name('dash');
    Route::get('/info/{ref}', [DashboardController::class, 'getTicketDetail'])->name('ticket_detail');
    
    //Tickets
    Route::post('/post', [TempTicketController::class, 'doPostTicket'])->name('PostTicket');
    Route::get('/detail', [TempTicketController::class, 'viewDetailTicket'])->name('detail');
    Route::get('/open-ticket', [TempTicketController::class, 'GetOpenTicket'])->name('open');
    Route::get('/close-ticket', [TempTicketController::class, 'GetCloseTicket'])->name('closed');

    // Customer Logout
    Route::get('/logout', [CustomerController::class, 'doLogout'])->name('logout');
});

// Customer Login
Route::get('/', [CustomerController::class, 'viewInput'])->name('login');
Route::post('/', [CustomerController::class, 'doInput'])->name('dologin');

Route::middleware(['validate.login'])->group(function () {
    // Dashboard Customer
    //Route::get('/admin', [DashboardController::class, 'index'])->name('dash');
    Route::get('/info/{ref}', [DashboardController::class, 'getTicketDetail'])->name('ticket_detail');
    
    //Tickets
    Route::post('/post', [TempTicketController::class, 'doPostTicket'])->name('PostTicket');
    Route::get('/detail', [TempTicketController::class, 'viewDetailTicket'])->name('detail');
    Route::get('/open-ticket', [TempTicketController::class, 'GetOpenTicket'])->name('open');
    Route::get('/close-ticket', [TempTicketController::class, 'GetCloseTicket'])->name('closed');

    // Customer Logout
    Route::get('/logout', [CustomerController::class, 'doLogout'])->name('logout');
});


Route::get('/op', [UserController::class, 'viewInput'])->name('loginAdmin');
Route::post('/op', [UserController::class, 'doInput'])->name('dologinAdmin');
Route::get('/register', [UserController::class, 'viewRegister'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');

Route::get('/admin', [AdminDashboard::class, 'index'])->name('adminDash');
