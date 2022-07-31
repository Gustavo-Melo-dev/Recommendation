<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecommendationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'cpf' => 'required|unique:recommendation|min:11|max:11',
            'telephone' => 'required|unique:recommendation|max:255',
            'email' => 'required|unique:recommendation|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',

            'cpf.required' => 'CPF é obrigatório!',
            'cpf.unique' => 'Esse CPF já foi cadastrado!',

            'telephone.required' => 'Telefone é obrigatório!',
            'telephone.unique' => 'Esse telefone já foi cadastrado!',

            'email.required' => 'Email é obrigatório!',
            'email.unique' => 'Esse Email já foi cadastrado!',
        ];
    }
}
