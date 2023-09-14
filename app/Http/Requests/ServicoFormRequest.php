<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Nome'=>'required|max:80|min:5|unique:servicos,Nome',
            'Descricao'=>'required|max:200|min:10',
            'Duracao'=>'required|numeric',
            'Preco'=>'required|decimal:2',
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){
        return [
            'Nome.required' => 'Nome obrigatório',
            'Nome.max' => 'Nome deve conter no máximo 80 caracteres',
            'Nome.min' => 'Nome deve conter no mínimo 5 caracteres',
            'Nome.unique' => 'Nome já cadastrado no sistema',
            'Descricao.required' => 'Descricao obrigatório',
            'Descricao.max' => 'Descricao deve conter no máximo 200 caracteres',
            'Descricao.min' => 'Descricao deve conter no mínimo 10 caracteres',
            'Duracao.required' => 'Duracao obrigatório',
            'Duracao.numeric' => 'Duracao deve conter apenas números',
            'Preco.required' => 'Preco obrigatório',
            'Preco.decimal' => 'Preco deve conter apenas casas decimais',
        ];
    }
}
