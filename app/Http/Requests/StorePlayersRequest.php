<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlayersRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|min:2',
            'position' => 'required|string|max:50|min:2',
            'number' => 'required|integer|max:100|min:0',
            'country' => 'required|string|max:100|min:2',
            'born_at' => 'date|before:today',
            'team_id' => 'required|integer|exists:teams,id',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'O campo nome é obrigatório',
            'position.required' => 'O campo posição é obrigatório',
            'number.required' => 'O campo número é obrigatório',
            'country.required' => 'O campo país é obrigatório',
            'born_at.required' => 'A data de nascimento é obrigatório',
            'team_id.required' => 'Dados não encontrados!',
        ];
    }
}
