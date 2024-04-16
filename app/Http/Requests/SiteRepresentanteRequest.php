<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRepresentanteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'email'=> 'required',
            'data_nascimento' => 'required',
            'celular' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'resposta-1' => 'required',
            'resposta-2' => 'required',
            'resposta-3' => 'required',
            'resposta-4' => 'required',
            'resposta-5' => 'required',
            'conhecimento' => 'nullable',
            'funcionarios' => 'nullable',
            'referencia-1' => 'nullable',
            'referencia-2' => 'nullable',
            'referencia-3' => 'nullable',
        ];
    }
}
