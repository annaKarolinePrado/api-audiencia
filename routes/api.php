<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('documentacao', 'DocumentacaoController@testar');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(["prefix" => "funcionario"], function () {
    Route::delete("/{id}/excluir", "FuncionarioController@excluir");
    Route::post("/salvar", "FuncionarioController@salvar");
});
Route::post('usuario/salvar', 'UserController@cadastrar');
Route::post('login', 'UserController@autenticar');
Route::get('open', 'DataController@open');


//tipoResponsavel
Route::group(["prefix" => "tipo-responsavel"], function () {    
    Route::get("/{id}", "TipoResponsavelController@getTipoResponsavel");    
    Route::get("/", "TipoResponsavelController@getTiposResponsaveis");    
    Route::post("/salvar", "TipoResponsavelController@salvar");    
    Route::delete("/{id}/excluir", "TipoResponsavelController@excluir");    
    Route::put("/atualizar", "TipoResponsavelController@atualizar");    
});

//naturezaTextoJuridico
Route::group(["prefix" => "natureza-texto-juridico"], function () {    
    Route::get("/{id}", "NaturezaTextoJuridicoController@getNaturezaJuridica");    
    Route::get("/", "NaturezaTextoJuridicoController@getNaturezasJuridicas");    
    Route::post("/salvar", "NaturezaTextoJuridicoController@salvar");    
    Route::delete("/{id}/excluir", "NaturezaTextoJuridicoController@excluir");    
    Route::put("/atualizar", "NaturezaTextoJuridicoController@atualizar");    
});

Route::group(["prefix" => "cidade","namespace" => "localizacao"], function () {
    Route::get("/{id}", "CidadeController@getCidade");
    Route::get("/{estado_id}/estado", "CidadeController@getCidadePorEstado");
});

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::put('enum', 'InteresseController@testarEnum');
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');
    //usuário
    Route::group(["prefix" => "usuario"], function () {
        Route::put("/atualizar", "UserController@atualizar");
    });
    
    //localizacao
    Route::group(["prefix" => "pais","namespace" => "localizacao"], function () {    
        Route::delete("/{id}/excluir", "PaisController@excluir");
        Route::post("/salvar", "PaisController@salvar");
        Route::Put("/atualizar", "PaisController@atualizar");
        
    });
    Route::group(["prefix" => "estado","namespace" => "localizacao"], function () {
        Route::delete("/{id}/excluir", "EstadoController@excluir");
        Route::post("/salvar", "EstadoController@salvar");
        Route::put("/atualizar", "EstadoController@atualizar");
    });    
    Route::group(["prefix" => "cidade","namespace" => "localizacao"], function () {
        Route::delete("/{id}/excluir", "CidadeController@excluir");
        Route::post("/salvar", "CidadeController@salvar");
        Route::put("/atualizar", "CidadeController@atualizar");
    });
    Route::group(["prefix" => "endereco","namespace" => "localizacao"], function () {
        Route::delete("/{id}/excluir", "EnderecoController@excluir");
        Route::post("/salvar", "EnderecoController@salvar");
        Route::put("/atualizar", "EnderecoController@atualizar");
    });

    Route::group(["prefix" => "empresa"], function () {
        Route::delete("/{id}/excluir", "EmpresaController@excluir");
        Route::post("/salvar", "EmpresaController@salvar");
        Route::post("/logo", "EmpresaController@salvarLogo");
        Route::put("/atualizar", "EmpresaController@atualizar");
        Route::get("/", "EmpresaController@getEmpresaUsuarioLogado");
    });
    Route::group(["prefix" => "funcionario"], function () {
        Route::delete("/{id}/excluir", "FuncionarioController@excluir");
        Route::post("/salvar", "FuncionarioController@salvar");
    });
});


