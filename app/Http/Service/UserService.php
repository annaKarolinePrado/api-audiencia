<?php

namespace App\Http\Service;
use App\Http\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Enums\Perfil;
use App\Http\Spec\UserSpec;
use App\Http\Service\EmpresaService;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserService
{
    private $empresaService;
    private $userRepository;
    public $userSpec;
    public function __construct()  {
       $this->userSpec = new UserSpec();
       $this->userRepository = new UserRepository();
    }
    public function obterUsuarioLogado(){
        $usuario = Auth::user();
        $this->userSpec->validarUsuario($usuario);
        return $usuario;
    }
    public function obterPorId($id){ 
        $usuario = $this->userRepository->obterPorId($id); 
        $this->userSpec->validarUsuario($usuario);      
        return $usuario;
    }
    public function validarUsuario($usuario){        
        return $this->userSpec->validarUsuario($usuario);
    }
    public function atualizar($request){   
        $usuario = $this->obterPorId($request->id);  
        $usuario->name = $request->name;
        $usuario->save();  
        return true;
    }
    public function salvar($request){
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'perfil' => $request->get('perfil') ? $request->get('perfil') : 'USUARIO',
        ]);
        return $user;
    }
    public function validarCamposObrigatorioCadastrar($request){
        $this->userSpec->validarCamposObrigatorioCadastrar($request); 
        return true;
    }
    public function validarCamposObrigatorioAtualizar($request){
        $this->userSpec->validarCamposObrigatorioAtualizar($request); 
        return true;
    }
}
