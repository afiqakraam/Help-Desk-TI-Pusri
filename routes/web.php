<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('home', [AuthController::class, 'dashboard'])->name('home');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('layouts.landing.landing');
})->name('index');
Route::get('ticket-reply/{id}',[TicketController::class,'replyTicket'])->name('ticket.reply');
Route::patch('ticket-reply-post/{id}',[TicketController::class,'replyticket_post'])->name('ticket.reply.post');
Route::get('create-ticket', [TicketController::class, 'create'])->name('ticket.create');
Route::resource('tickets', TicketController::class);

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('process-ticket/{id}/{type}', [TicketController::class, 'process'])->name('ticket.process');

Route::get('dashboard-client', [TicketController::class, 'dashboardClient'])->name('client.dashboard');

Route::get('close/{id}',[TicketController::class,'closeTicketStatus'])->name('ticket.close');

Route::get('getUserTicket/{id}',[TicketController::class,'getUserTicket'])->name('ticket.user');

Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

Route::get('/profiles', [AuthController::class, 'profileView'])->name('auth.profiles');
Route::patch('profile-post',[AuthController::class,'updateProfile'])->name('profile.post');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/view-pdf', [AuthController::class, 'viewPDF'])->name('view-pdf');

Route::post('filter',[TicketController::class,'filterbymonth'])->name('filterbymonth');
