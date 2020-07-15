<?php

namespace App\Http\Controllers;
use App\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ResponsavelController extends Controller
{
    private $objeto;

    public function __construct()  {
        $this->objeto = new Responsavel();
    }

    public function salvar(Request $request){
        $objeto = Responsavel::create($request->all());
        return response()->json($objeto,200);
    }

    public function atualizar(Request $request){
        if (!$request->id){
            return response()->json(['mensagem' =>'Não informado o responsavel para atualizar'],500);
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
        return response()->json(Responsavel::all(),200);
    }
}
