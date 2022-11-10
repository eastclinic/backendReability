<?php

namespace Modules\Reviews\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'reviewable_type' =>'nullable',
            'limit' =>'nullable',
            'offset' =>'nullable',
            'page' =>'nullable',
            'itemsPerPage' =>'nullable',
            'mustSort' =>'nullable',
            'multiSort' =>'nullable',
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
