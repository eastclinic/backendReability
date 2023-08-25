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
//            'contentable_type' => ['required', 'in:review,review_message'],
            'reviewId' => ['required', 'numeric'],
            'messageId' => [['nullable', 'numeric'],],
//            'id' => ['integer', 'nullable'],
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
            'files.*.mimes' => 'Неправильный тип изображение. Возможно jpg,jpeg,png',
            'reviewable_id.required' => 'Be sure to specify id of review target',
//            'rating.required' => 'Be sure to specify id of review target',
        ];
    }

//    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
//    {
//        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
//            'errors' => $validator->errors(), 'ok' => false
//        ], 422));
//    }

}
