<?php

namespace App\Http\Controllers;
use App\TipoAto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class TipoAtoController extends Controller
{
    private $objeto;

    public function __construct()  {
        $this->objeto = new TipoAto();
    }

    public function salvar(Request $request){
        $objeto = TipoAto::create($request->all());
        return response()->json($objeto,200);
    }

    public function atualizar(Request $request){
        if (!$request->id){
            return response()->json(['mensagem' =>'Não informado o Tipo de ato para atualizar'],500);
        } 
        $objeto = $this->objeto->find($request->id);
        $objeto->update($request->all());
        return response()->json($objeto,200);
    }

    public function excluir($id) {
        $this->getID($id)->delete();
        $retorno = [
            'mensagem' => 'excluído com sucesso'
        ];
        return response()->json($retorno,200);
    }
    
    public function get($id)  {
        return response()->json($this->objeto->find($id));
    }
    
    public function getID($id)  {
        return $this->objeto->find($id);
    }

    public function getAll()  {
        return response()->json(TipoAto::all(),200);
    }
}
