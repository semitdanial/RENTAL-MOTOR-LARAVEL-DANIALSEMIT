<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SewaMotorController;
use App\Http\Controllers\DashboardPostController;

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

// Welcome Page
Route::get('/well', function () {
    return view('welcome');
});

// Home Page
Route::get('/', function () {
    return view('beranda', [
        "title" => "Home Page",
    ]);
});

//new bike
Route::get('/newbike', function () {
    return view('newbike', [
        "title" => "New Motorike",
    ]);
});
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);

//login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Registration Page
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'indexadmin'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'indexuser'])->name('user.dashboard');
});
Route::get('/informasi', function () {
    return view('dashboard.informasi.index',[
        "title" => "INFORMASI",
    ]);
});

Route::get('/dashboard/booking-motor', [BookingController::class, 'showForm'])->name('booking.showForm');
Route::post('/dashboard/booking-motor', [BookingController::class, 'storeBooking'])->name('booking.store');
Route::get('/dashboard/daftar-booking', [BookingController::class, 'showBookings'])->name('booking.showBookings');

//inputt motor
Route::get('/dashboard/sewa-motor/create', [SewaMotorController::class, 'showCreateForm'])->name('sewa.create');
Route::post('/dashboard/sewa-motor/create', [SewaMotorController::class, 'storeMotor'])->name('sewa.storeMotor');

Route::get('/sewa_motor', [BookingController::class, 'index'])->name('sewaMotor.index');
Route::get('/sewa_motor/kembalikan/{id}', [BookingController::class, 'kembalikanMotor'])->name('sewaMotor.kembalikan');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/sewa-motor/{ipd}/edit', [BookingController::class, 'edit'])->name('sewaMotor.edit');
Route::put('/sewa-motor/{id}/update', [BookingController::class, 'update'])->name('sewaMotor.update');
Route::get('/sewaMotor/{sewaMotor}/edit', [SewaMotorController::class, 'edit'])->name('sewaMotor.edit');

