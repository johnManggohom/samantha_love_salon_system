<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Cashier\cashierIndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\appointmentController;
use App\Http\Controllers\Admin\calendarController;
use App\Http\Controllers\Admin\cartController;
use App\Http\Controllers\Admin\dashCont;
use App\Http\Controllers\Admin\inventoryController;
use App\Http\Controllers\Admin\userController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\servicesOnCartCOntroller;
use App\Http\Controllers\Admin\transactionController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware(['auth', 'verified'])->group(function () {
//   Route::get('/dashboard', [dashCont::class, 'index'])->name('dashboard');
// });
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(
    function(){
        Route::get('/dashboard', [IndexController::class, 'index'])->name('index');

        Route::post('roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
         Route::delete('roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/roles', RoleController::class);
         Route::resource('/permissions', PermissionController::class);
         Route::post('/permissions/{permission}/roles',[PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::get('/users', [userController::class, 'index'])->name('user.index');
        Route::get('/users/{user}', [userController::class, 'show'])->name('user.show');
         Route::delete('/users/{user}',[userController::class, 'destroy'])->name('user.destroy');
         Route::post('/users/{user}/roles' , [userController::class, 'assignRole'])->name('user.roles');
          Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('user.roles.remove');
          Route::post('/users/{user}/permissions' , [userController::class, 'givePermission'])->name('user.permissions');
         Route::delete('/users/{user}/permissions/{permission}' , [userController::class, 'revokePermission'])->name('user.permissions.revoke');

         //service
         Route::resource('/services', ServicesController::class);

         //appointment

          Route::post('/appointment/{appointment}' , [appointmentController::class, 'update'])->name('appointment.update');
           Route::post('/appointment/reject/{appointment}' , [appointmentController::class, 'rejectAppointment'])->name('appointment.reject.rejectAppointment');
           Route::post('/appointment/finished/{appointment}' , [appointmentController::class, 'finishedAppointment'])->name('appointment.finished.finishedAppointment');
            Route::resource('/appointment', appointmentController::class);
            Route::delete('/appointment/{appointment}',[appointmentController::class, 'destroy'])->name('appointment.delete');
            //calendar
             Route::resource('/calendar', calendarController::class);

               Route::resource('/transaction', transactionController::class);

             Route::resource('/inventory', inventoryController::class);
            Route::get('/cashier', [servicesOnCartCOntroller::class, 'index'])->name('cashier.index');
             Route::post('/cashier',[cartController:: class, 'store'])->name('cashier.store');


    }
               
            
);

Route::middleware(['auth', 'role:cashier'])->name('cashier.')->prefix('cashier')->group(
    function(){
        Route::get('/dashboard', [cashierIndexController::class, 'index'])->name('index');
    }
);


require __DIR__.'/auth.php';
