<?php

namespace Modules\Reviews\Http\Requests\Admin\Reviews;

use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Reviews\Http\Services\Target;

class StoreContentRequest extends FormRequest
{

    public function __construct(ValidationFactory $validationFactory, Target $targetModel) {
        $validationFactory->extend(
            'checkTarget',
            function ($attribute, $value, $parameters) use ($targetModel){
                return $targetModel->checkTargetName($value);
            },
            'Not have target'
        );

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [ //пока напрямую задаем, потом можно будет брать из объекта Access
            'files.*' => 'required|file|mimes:jpg,jpeg,png|max:4096',
            'contentable_type' => 'required',
            'id' => ['integer', 'nullable'],
        ];

        //Не забываем что этот метод вызывается на get запрос, и все параметры передаются в виде строки
        return [ //пока напрямую задаем, потом можно будет брать из объекта Access
            'file' =>'required',
            'contentable_type' => 'required',
            //'author_id' => 'nullable',
            'url' => 'required',
            'contentable_id' => 'required',
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
//    public function messages()
//    {
//        return [
//            'reviewable_type.required' => 'Be sure to specify type of review target',
//            'reviewable_id.required' => 'Be sure to specify id of review target',
////            'rating.required' => 'Be sure to specify id of review target',
//        ];
//    }

//    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
//    {
//        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
//            'errors' => $validator->errors(), 'ok' => false
//        ], 422));
//    }

}
