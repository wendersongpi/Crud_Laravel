<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamsRequest extends FormRequest
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
            'name' => 'required|max:50|unique:teams|min:2',
            'country' => 'required|max:100|min:2',
            'foundation_year' => 'required|max:2020|min:1800|integer'
        ];
    }
    public function messages(){
        return[
            'name.required' => 'O campo nome é obrigatório',
            'country.required' => 'O campo pais é obrigatório',
            'foundation_year.required' => 'O campo fundação é obrigatório',
        ];
    }
}
