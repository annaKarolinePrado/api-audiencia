<?php

namespace App\Http\Controllers;
use App\NaturezaTextoJuridico;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class NaturezaTextoJuridicoController extends Controller
{
    private $naturezaJuridica;

    public function __construct()  {
        $this->naturezaJuridica = new NaturezaTextoJuridico();
    }

    public function salvar(Request $request){
        $naturezaJuridica = NaturezaTextoJuridico::create($request->all());
        return response()->json($naturezaJuridica,200);
    }

    public function atualizar(Request $request){
        if (!$request->id){
            return response()->json(['mensagem' =>'Não informado a Natureza do Texto jurídico para atualizar'],500);
        } 
        $naturezaJuridica = $this->naturezaJuridica->find($request->id);
        $naturezaJuridica->update($request->all());
        return response()->json($naturezaJuridica ,200);
    }

    public function excluir($id) {
        $this->getNaturezaJuridicaID($id)->delete();
        $retorno = [
            'mensagem' => 'excluído com sucesso'
        ];
        return response()->json($retorno,200);
    }
    
    public function getNaturezaJuridica($id)  {
        return response()->json($this->naturezaJuridica->find($id));
    }
    
    public function getNaturezaJuridicaID($id)  {
        return $this->naturezaJuridica->find($id);
    }

    public function getNaturezasJuridicas()  {
        return response()->json(NaturezaTextoJuridico::all(),200);
    }
}