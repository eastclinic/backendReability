<?php

namespace Modules\Reviews\Http\Requests\Admin\Reviews;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'author' =>['nullable'],
            'text' =>'nullable',
            //'author_id' => 'nullable',
            'reviewable_type' => ['nullable', Rule::in(array_keys(Relation::$morphMap))],
            'reviewable_id' => 'nullable',
            'rating' => ['nullable', 'numeric'],
            'published' => ['nullable', 'boolean'],
            'is_new' => ['nullable', 'boolean']
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'reviewable_id.required' => 'A title is required',
            'rating.numeric' => 'Рейтинг должен быть числом'
        ];
    }
}
