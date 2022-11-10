<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Не забываем что этот метод вызывается на get запрос, и все параметры передаются в виде строки
        return [ //пока напрямую задаем, потом можно будет брать из объекта Access
            'limit' =>'nullable',
            'offset' =>'nullable',
            'page' =>'nullable',
            'itemsPerPage' =>'nullable',
            'sortBy.*' =>'string|nullable',
            'sortDesc.*' =>'string|nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
