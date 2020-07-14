<?php

namespace App\Http\Controllers;
use App\TipoResponsavel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class TipoResponsavelController extends Controller
{
    private $tipoResponsavel;

    public function __construct()  {
        $this->tipoResponsavel = new TipoResponsavel();
    }

    public function salvar(Request $request){
        $tipoResponsavel = TipoResponsavel::create($request->all());
        return response()->json($tipoResponsavel,200);
    }

    public function atualizar(Request $request){
        if (!$request->id){
            return response()->json(['mensagem' =>'Não informado o Tipo de Responsavel para atualizar'],500);
        } 
        $tipoResponsavel = $this->tipoResponsavel->find($request->id);
        $tipoResponsavel->update($request->all());
        return response()->json($tipoResponsavel,200);
    }

    public function excluir($id) {
        $this->getTipoResponsavelID($id)->delete();
        $retorno = [
            'mensagem' => 'excluído com sucesso'
        ];
        return response()->json($retorno,200);
    }
    
    public function getTipoResponsavel($id)  {
        return response()->json($this->tipoResponsavel->find($id));
    }
    
    public function getTipoResponsavelID($id)  {
        return $this->tipoResponsavel->find($id);
    }

    public function getTiposResponsaveis()  {
        return response()->json(TipoResponsavel::all(),200);
    }
}
