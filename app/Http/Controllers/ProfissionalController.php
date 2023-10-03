<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\UpdateProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function profissional(ProfissionalFormRequest $request){
        $profissional = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento' => $request->complemento,
            'senha' => $request->senha,
            'salario' => $request->salario,
            
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Registro de profissional bem-sucedido",
            "data"=> $profissional
        ]);
    }
    public function profissionalId($id){
        $profissional = Profissional::find($id);
        if($profissional == null){
            return response()->json([
                'status' => false,
                'message' => "Profissional não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function profissionalNome(Request $request){
        $profissional = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
        if(count($profissional) > 0){
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->Json([
            'status' => true,
            'message' => "Não há resultados para pesquisa"
        ]);
    }
    public function profissionalCpf(Request $request){
        $profissional = Profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if(count($profissional) > 0){
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->Json([
            'status' => true,
            'message' => "Não há resultados para pesquisa"
        ]);
    }
    public function profissionalCelular(Request $request){
        $profissional = Profissional::where('celular', 'like', '%' . $request->celular . '%')->get();
        if(count($profissional) > 0){
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->Json([
            'status' => true,
            'message' => "Não há resultados para pesquisa"
        ]);
    }
    public function profissionalEmail(Request $request){
        $profissional = Profissional::where('email', 'like', '%' . $request->email . '%')->get();
        if(count($profissional) > 0){
            return response()->json([
                'status' => true,
                'data' => $profissional
            ]);
        }
        return response()->Json([
            'status' => true,
            'message' => "Não há resultados para pesquisa"
        ]);
    }
    public function profissionalRetornar(){
        $profissional = Profissional::All();
        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }
    public function profissionalExcluir($id){
        $profissional = Profissional::find($id);
        if(!isset($profissional)){
            return response()->json([
                'status' => false,
                'message' => 'Profissional não encontrado'
            ]);
        }
        $profissional->delete();
        return response()->json([
            'status' => true,
            'message' => 'Profissional deletado com êxito'
        ]);
        }
        public function profissionalUpdate(UpdateProfissionalFormRequest $request){
            $profissional = Profissional::find($request->id);
            if(!isset($profissional)){
                return response()->json([
                    'status' => false,
                    'message' => "Profissional não encontrado"
                ]);
            }
            if(isset($request->nome)){
                $profissional->nome = $request->nome;
            }
            if(isset($request->celular)){
                $profissional->celular = $request->celular;
            }
            if(isset($request->email)){
                $profissional->email = $request->email;
            }
            if(isset($request->cpf)){
                $profissional->cpf = $request->cpf;
            }
            if(isset($request->dataNascimento)){
                $profissional->dataNascimento = $request->dataNascimento;
            }
            if(isset($request->cidade)){
                $profissional->cidade = $request->cidade;
            }
            if(isset($request->estado)){
                $profissional->estado = $request->estado;
            }
            if(isset($request->pais)){
                $profissional->pais = $request->pais;
            }
            if(isset($request->rua)){
                $profissional->rua = $request->rua;
            }
            if(isset($request->numero)){
                $profissional->numero = $request->numero;
            }
            if(isset($request->bairro)){
                $profissional->bairro = $request->bairro;
            }
            if(isset($request->cep)){
                $profissional->cep = $request->cep;
            }
            if(isset($request->complemento)){
                $profissional->complemento = $request->complemento;
            }
            if(isset($request->senha)){
                $profissional->senha = $request->senha;
            }
            $profissional->update();
            return response()->json([
                'status' => true,
                'message' => 'Profissional atualizado'
            ]);
    }
}