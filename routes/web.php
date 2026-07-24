<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReservaController;
use App\Http\Middleware\IsUser;
use App\Http\Controllers\AdminController;

//Ruta principal,redirigir segun el rol
Route::get('/', function () {
    //si el usuario esta autenticado
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role === 'user') {
            return redirect()->route('user.welcome'); // o tambien return view('welcome');
        }
    }
    // si no esta autenticado, mostrar vista welcome
    return view('welcome');
})->name('inicio');

//vistas publicas
Route::view('/nosotros', 'user.nosotros')->name('nosotros');
Route::view('/contacto', 'user.contacto')->name('contacto');
Route::view('/politicas', 'user.politicas')->name('politicas');
Route::view('/terminos', 'user.terminos')->name('terminos');
Route::view('/servicios', 'user.servicios')->name('servicios');

Route::post('/contacto', function (\Illuminate\Http\Request $request) {
    // Aquí puedes guardar en la base de datos o enviar un correo
    return back()->with('success', 'Tu mensaje ha sido enviado correctamente');
})->name('enviar.contacto');

// ruta para el registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PANEL ADMINISTRADOR
|--------------------------------------------------------------------------
*/
Route::get('/admin', [AdminController::class, 'dashboard'])->middleware(['auth', 'is_admin'])->name('admin.dashboard');
//rutas administrativas protegidas por middleware
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')
->group(function () {
    //rutas para gestionar destinos
    Route::resource('destinations', DestinationController::class)->except(['show']);
    //ruta para gestionar usuarios
    Route::resource('users', UserController::class);
    //gestionar reservas desde el panel admin

    //ruta para eliminar imagenes de destinos
    Route::delete(
    '/destination-images/{image}',
    [DestinationController::class, 'destroyImage']
)
->name('destination-images.destroy');

//ruta para eliminar la imagen principal de un destino
Route::delete(
    '/destinations/{destination}/delete-image',
    [DestinationController::class, 'deleteImage']
)->name('destinations.deleteImage');

    Route::get('/reservas', [ReservaController::class, 'adminIndex'])->name('reservas.index');
    Route::get('/reservas/create', [ReservaController::class, 'adminCreate'])->name('reservas.create');//{destination}
    Route::post('/reservas', [ReservaController::class, 'adminStore'])->name('reservas.store');
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'adminEdit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'adminUpdate'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'adminDestroy'])->name('reservas.destroy');
    Route::get('reservas/{id}', [ReservaController::class, 'adminShow'])->name('reservas.show');
    Route::get('/reservas/{id}/enviar-correo', [ReservaController::class, 'enviarCorreoConfirmacion'])->name('reservas.enviarCorreo');
    //exportar reservas a excel
    Route::get('/reservas/export/excel', [ReservaController::class, 'exportExcel'])->name('reservas.export.excel');
    //exportar reservas a pdf
    Route::get('/reservas/export/pdf', [ReservaController::class, 'exportPDF'])->name('reservas.export.pdf');
    //ruta para confirmar reserva

    // Confirmar reserva
Route::put('/reservas/{reserva}/confirmar', [ReservaController::class, 'confirmar'])
    ->name('reservas.confirmar');

// Rechazar reserva
Route::put('/reservas/{reserva}/rechazar', [ReservaController::class, 'rechazar'])
    ->name('reservas.rechazar');



});

/*|--------------------------------------------------------------------------
| PANEL USUARIO AUTENTICADO
|----------------------------------------------------------------------------
*/

Route::middleware(['auth', IsUser::class])->prefix('user')->group(function () { //->prefix('user') ->name('user.')
    //pagina principal del usuario autenticado
    Route::get('/inicio',[DestinationController::class, 'indexUser'])->name('user.welcome');
    //gestion de reservas del usuario autenticado
    Route::get('/perfil', function(){
        return view('user.profile');
    })->name('user.profile');
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');//{destination}
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});



//rutas publicas para destinos
Route::get('/destinations', [DestinationController::class, 'publicIndex'])->name('destinations.index');
//Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/destinations/{destination}', [DestinationController::class, 'show'])->name('destinations.show');


Route::get('/', [DestinationController::class, 'home'])
    ->name('inicio');