<?php

use App\Http\Controllers\Fqr\AuthController;
use App\Http\Controllers\Fqr\MyFQRController;
use App\Http\Controllers\Fqr\FQRRecordController;
use FQr\Log\Applications\Contracts\ILogHttpServer;
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

    app(ILogHttpServer::class)->execute('home','home');

return view('home');
})->name('home');



//Registro de usuario.
//--------------------
// (link, funcion o metodo de clase)
Route::get ('registrarme', [FQRRecordController::class, 'index'])->name('registrarme.index');
Route::post('registrarme', [FQRRecordController::class, 'new'])->name('registrarme.new');

Route::post('fqr-reenviar-activacion', [FQRRecordController::class, 'resendActivation'])->name('fqr.reenviarActivacion');


//Envia email
Route::get('activar-my-fqr', [FQRRecordController::class, 'activarCuenta'])->name('registro.activar')->middleware('signed');
Route::get('condiciones-de-uso-fqr', [FQRRecordController::class, 'condicionesDeUsoFQR'])->name('condiciones.de.uso');

//Obtencion del Flyer
//---------------------------------------
Route::get('mi-fqr', [MyFQRController::class, 'home'])->name('mi-fqr.home');  //my-fqr.home
Route::post('mi-fqr',[MyFQRController::class,'forEmail'])->name('my-fqr.post');
Route::get('/mi-fqr/{flyerKey}', [MyFQRController::class,'forFlyerKey'])->name('my-fqr.forFlyerKey');
//--------------------


//spatie seguridad
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('FQR-Login', [AuthController::class, 'index'])->name('FQR.Login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('prueba-de',function(){return 'hola mundo';})->name("saludo.bienvenida");

Route::get('saludo', function () {
    return redirect()->route('saludo.bienvenida');
});