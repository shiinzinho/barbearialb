<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function Servico(ServicoFormRequest $request){
        $servico = Servico::create([
            'Nome' => $request->Nome,
            'Descricao' => $request->Descricao,
            'Duracao' => $request->Duracao,
            'Preco' => str_replace(',', '.', $request->Preco),
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Registro de serviço bem-sucedido",
            "data"=> $servico
        ]);
    }
    public function ServicoID($id){
        $servico = Servico::find($id);
        if($servico == null){
            return response()->json([
                'status' => false,
                'message' => "Serviço não encontrado"
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function ServicoNome(Request $request){
        $servico = Servico::where('Nome', 'like', '%' . $request->Nome . '%')->get();
        if(count($servico) > 0){
            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        return response()->Json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function ServicoDescricao(Request $request){
        $servico = Servico::where('Descricao', 'like', '%' . $request->Descricao . '%')->get();
        if(count($servico) > 0){
            return response()->json([
                'status' => true,
                'data' => $servico
            ]);
        }
        return response()->Json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function ServicoRetornar(){
        $servico = Servico::All();
        return response()->json([
            'status' => true,
            'data' => $servico
        ]);
    }
    public function ServicoExcluir($id){
        $servico = Servico::find($id);
        if(!isset($servico)){
            return response()->json([
                'status' => false,
                'message' => 'Serviço não encontrado'
            ]);
        }
        $servico->delete();
        return response()->json([
            'status' => true,
            'message' => 'Serviço deletado com êxito'
        ]);
        }
        public function ServicoUpdate(UpdateFormRequest $request){
            $servico = Servico::find($request->id);
            if(!isset($servico)){
                return response()->json([
                    'status' => false,
                    'message' => "Serviço não encontrado"
                ]);
            }
            if(isset($request->Nome)){
                $servico->Nome = $request->Nome;
            }
            if(isset($request->Descricao)){
                $servico->Descricao = $request->Descricao;
            }
            if(isset($request->Duracao)){
                $servico->Duracao = $request->Duracao;
            }
            if(isset($request->Preco)){
                $servico->Preco = $request->Preco;
            }
            $servico->update();
            return response()->json([
                'status' => true,
                'message' => 'Serviço atualizado'
            ]);
    }
}