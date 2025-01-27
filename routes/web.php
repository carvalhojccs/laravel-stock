<?php

use App\Livewire\Users\UsersShow;
use App\Livewire\Users\UsersIndex;
use App\Livewire\Users\UsersCreate;
use App\Livewire\Orders\OrdersCreate;
use Illuminate\Support\Facades\Route;
use App\Livewire\Users\Type\DoctorsCreate;
use App\Http\Controllers\ProfileController;
use App\Livewire\Users\Type\EmployeesCreate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', UsersIndex::class)->name('users.index');
    Route::get('/users/create', UsersCreate::class)->name('users.create');
    Route::get('/users/{user}', UsersShow::class)->name('users.show');
    Route::get('/orders', OrdersCreate::class)->name('orders.create');

    Route::get('/users/doctors/create', DoctorsCreate::class)->name('users.doctors.create');
    Route::get('/users/employees/create', EmployeesCreate::class)->name('users.employees.create');
});

require __DIR__.'/auth.php';
