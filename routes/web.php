<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
   BilheteController,
    CarroController,
    ClienteController,
    FuncionarioController,
    HorarioController,
    MotoristaController,
    PendenteController,
    RoutaController,
    UserController,
    ViagenController
};
use App\Models\Bilhete;
use App\Models\Cliente;

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        if(Auth::user()->tipo != "Cliente"){
            return view('pages.index');
        }else{
            return redirect()->route('client.index');
        }
    });
    Route::resource('user',UserController::class);
    Route::get('user/{id}/apagar',[UserController::class,'apagar'])->name('user.apagar');

   
    Route::get('cliente/{id}/apagar',[ClienteController::class,'apagar'])->name('cliente.apagar');
    
    Route::resource('funcio',FuncionarioController::class);
    Route::get('funcio/{id}/apagar',[FuncionarioController::class,'apagar'])->name('funcio.apagar');
    
    Route::resource('motorista',MotoristaController::class);
    Route::get('motorista/{id}/apagar',[MotoristaController::class,'apagar'])->name('motorista.apagar');


    Route::resource('rota',RoutaController::class);
    Route::get('rota/{id}/apagar',[RoutaController::class,'apagar'])->name('rota.apagar');

    Route::resource('viagen',ViagenController::class);
    Route::get('viagen/{id}/apagar',[ViagenController::class,'apagar'])->name('viagen.apagar');

    Route::resource('horario',HorarioController::class);
    Route::get('horario/{id}/apagar',[HorarioController::class,'apagar'])->name('horario.apagar');

    Route::resource('carro',CarroController::class);
    Route::get('carro/{id}/apagar',[CarroController::class,'apagar'])->name('carro.apagar');

    Route::resource('pendente',PendenteController::class);
    Route::resource('cliente',ClienteController::class);

    Route::get('perfil',[UserController::class,'perfil'])->name('perfil');

});
Route::group(['prefix'=>'buy','middleware'=>'auth'],function(){
    Route::get('/',function(){
        Bilhete::bilheteActivo();
        return view('pages.cliente.index');
    })->name('client.index');

    Route::get('ticket/{id}',[BilheteController::class,'ticket'])->name('ticket');
    Route::get('acento/{id}',[BilheteController::class,'acento'])->name('acento');
    Route::resource('bilhete',BilheteController::class);
    Route::get('/teste/bilhete',function(){
        return view('pages.cliente.bilhete');
    });


    Route::get('listaBuy', function () {
        return view('pages.cliente.listaComprados');
    })->name('listaC');
});


Route::post('user/cadastro',[UserController::class,'cadastrar'])->name('user.register');

Route::get('cadastrar',function(){
    return view('auth.cadastrar');
})->name('form');

Route::post('auth',[UserController::class,'auth'])->name('user.auth');
Route::get('entrar',function(){
    return view('auth.login');
})->name('auth.login');
Auth::routes();

Route::get('/home', function(){
    if(Auth::user()->tipo != 'Cliente'){
        return redirect('/');
    }else{
         return redirect()->route('client.index');
    }
})->name('home');
