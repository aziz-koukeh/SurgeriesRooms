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

Auth::routes();

Route::get('/home', [App\Http\Controllers\SurgeryController::class, 'index'])->name('home');
// Route::get('/TomorrowSurgeries', [App\Http\Controllers\SurgeryController::class, 'tomorrowSurgeries'])->name('tomorrowSurgeries');
// Route::get('/YesterDaySurgeries', [App\Http\Controllers\SurgeryController::class, 'yesterDaySurgeries'])->name('yesterDaySurgeries');

Route::get('/CreateSurgery', [App\Http\Controllers\SurgeryController::class, 'create'])->name('createSurgery');
Route::post('/StoreSurgery', [App\Http\Controllers\SurgeryController::class, 'store'])->name('storeSurgery');
Route::get('/EditSurgery/{surgery_slug}', [App\Http\Controllers\SurgeryController::class, 'edit'])->name('editSurgery');
Route::post('/UpdateSurgery/{surgery_slug}', [App\Http\Controllers\SurgeryController::class, 'update'])->name('updateSurgery');
Route::get('/DeleteSurgery/{surgery_slug}', [App\Http\Controllers\SurgeryController::class, 'destroy'])->name('deleteSurgery');

Route::get('/SurgeriesShow/{date}',[App\Http\Controllers\HomeController::class, 'showSurgeries'])->name('showSurgeries');

Route::post('/SurgeriesByDateRouteing',[App\Http\Controllers\SurgeryController::class, 'surgeriesByDateRouteing'])->name('surgeriesByDateRouteing');
Route::get('/SurgeriesByDate/{date}',[App\Http\Controllers\SurgeryController::class, 'surgeriesByDate'])->name('surgeriesByDate');


Route::get('/UsersMangemant', [App\Http\Controllers\MangmentController::class, 'usersMang'])->name('usersMang');
Route::post('/UpdateUser/{user_slug}', [App\Http\Controllers\MangmentController::class, 'updateUser'])->name('updateUser');
Route::get('/DeleteUser/{user_slug}', [App\Http\Controllers\MangmentController::class, 'destroyUser'])->name('deleteUser');

// --------------Employee ----------------------
Route::get('/EmployeesMangemant', [App\Http\Controllers\MangmentController::class, 'employeesMang'])->name('employeesMang');
Route::post('/StoreEmployee', [App\Http\Controllers\MangmentController::class, 'storeEmployee'])->name('storeEmployee');
Route::post('/CreateAccount/{employee_slug}', [App\Http\Controllers\MangmentController::class, 'createAccount'])->name('createAccount');
Route::post('/UpdateEmployee/{employee_slug}', [App\Http\Controllers\MangmentController::class, 'updateEmployee'])->name('updateEmployee');
Route::get('/DeleteEmployee/{employee_slug}', [App\Http\Controllers\MangmentController::class, 'destroyEmployee'])->name('deleteEmployee');
// --------------Employee ----------------------

// --------------Devices ----------------------
Route::get('/DevicesMangemant', [App\Http\Controllers\MangmentController::class, 'devicesMang'])->name('devicesMang');
Route::post('/StoreDevice', [App\Http\Controllers\MangmentController::class, 'storeDevice'])->name('storeDevice');
Route::post('/UpdateDevice/{device_slug}', [App\Http\Controllers\MangmentController::class, 'updateDevice'])->name('updateDevice');
Route::get('/DeleteDevice/{device_slug}', [App\Http\Controllers\MangmentController::class, 'destroyDevice'])->name('deleteDevice');
// --------------Devices ----------------------

Route::get('/Mangemant', [App\Http\Controllers\SurgeryController::class, 'surgeryTime'])->name('surgeryTime');
