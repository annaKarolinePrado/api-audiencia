<?php

namespace App\Http\Controllers;
use App\Ato;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\TipoAto;

class AtoController extends Controller
{
    private $objeto;

    public function __construct()  {
        $this->objeto = new Ato();
    }

    public function salvar(Request $request){
        $objeto = Ato::create($request->all());
        return response()->json($objeto,200);
    }

    public function atualizar(Request $request){
        if (!$request->id){
            return response()->json(['mensagem' =>'Não informado o ato para atualizar'],500);
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
        return response()->json(Ato::all(),200);
    }
    
    public function getFK()  {
        $atos = Ato::all();
        $cont = 0;
        foreach ($atos as $ato) {
            $cont = $cont +1 ;
            $tipo = $this->getTipoAto($ato->tipo);
            $ret = [
                "ato"=> $ato,
                "tipo"=> $tipo
            ];
            if($cont == 1){
                $array=$ret;
            }
            array_push($array,$ret);
        }
        return response()->json($array,200);
    }

    public function getTipoAto($id)  {
        $tipoAto = new TipoAto();
        return $tipoAto->find($id);
    }
}
