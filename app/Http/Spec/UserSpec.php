<?php
namespace App\Http\Spec;
use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Validator;
use App\Http\Service\EmpresaService;
use App\Enums\Perfil;

class UserSpec
{
    public function __construct()  {
    }
    
    public function validarUsuario($usuario){
        if(!$usuario){
            ApiException::lancarExcessao(5,'Usuário'); 
        }        
    }   
    public function validarCamposObrigatorioCadastrar($request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            ]);
            if($validator->fails()){
                ApiException::lancarExcessao(11,$validator->errors()->toJson());
            }
        return true;      
    }
    public function validarCamposObrigatorioAtualizar($request){        
        $validator = Validator::make($request->all(), [
            'id' =>  'required',
            'name' => 'required|string|max:255'
        ]);
        if($validator->fails()){
            ApiException::lancarExcessao(11,$validator->errors()->toJson());
        }
        return true;      
    }
    public function validarStatus($enviado,$esperado,$mensagemDoErro){        
        if($enviado != $esperado){
            ApiException::lancarExcessao(16,$mensagemDoErro);
        }
        return true;      
    }
}
