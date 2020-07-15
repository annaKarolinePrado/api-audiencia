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

//tipoAto
Route::group(["prefix" => "tipo-ato"], function () {    
    Route::get("/{id}", "TipoAtoController@get");    
    Route::get("/", "TipoAtoController@getAll");    
    Route::post("/salvar", "TipoAtoController@salvar");    
    Route::delete("/{id}/excluir", "TipoAtoController@excluir");    
    Route::put("/atualizar", "TipoAtoController@atualizar");    
});

//fonteDivulgacao
Route::group(["prefix" => "fonte-divulgacao"], function () {    
    Route::get("/{id}", "FonteDivulgacaoController@get");    
    Route::get("/", "FonteDivulgacaoController@getAll");    
    Route::post("/salvar", "FonteDivulgacaoController@salvar");    
    Route::delete("/{id}/excluir", "FonteDivulgacaoController@excluir");    
    Route::put("/atualizar", "FonteDivulgacaoController@atualizar");    
});

//ato
Route::group(["prefix" => "ato"], function () {    
    Route::get("/{id}", "AtoController@get");    
    Route::get("/", "AtoController@getAll"); 
    Route::post("/salvar", "AtoController@salvar");    
    Route::delete("/{id}/excluir", "AtoController@excluir");    
    Route::put("/atualizar", "AtoController@atualizar");    
});
Route::get("/ato-dto", "AtoController@getFK");  

//audiencia
Route::group(["prefix" => "audiencia"], function () {    
    Route::get("/{id}", "AudienciaController@get");    
    Route::get("/", "AudienciaController@getAll");       
    Route::post("/salvar", "AudienciaController@salvar");    
    Route::delete("/{id}/excluir", "AudienciaController@excluir");    
    Route::put("/atualizar", "AudienciaController@atualizar");    
});

//audiencia
Route::group(["prefix" => "responsavel"], function () {    
    Route::get("/{id}", "ResponsavelController@get");    
    Route::get("/", "ResponsavelController@getAll");       
    Route::post("/salvar", "ResponsavelController@salvar");    
    Route::delete("/{id}/excluir", "ResponsavelController@excluir");    
    Route::put("/atualizar", "ResponsavelController@atualizar");    
});
    
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(["prefix" => "cidade","namespace" => "localizacao"], function () {
    Route::get("/{id}", "CidadeController@getCidade");
    Route::get("/{estado_id}/estado", "CidadeController@getCidadePorEstado");
});

Route::group(['middleware' => ['jwt.verify']], function() {
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
});


