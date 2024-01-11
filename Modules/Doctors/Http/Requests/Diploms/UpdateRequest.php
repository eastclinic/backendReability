<?php

namespace Modules\Doctors\Http\Requests\Diploms;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=> ['nullable', 'string'],
            'published'=> ['nullable'],
            'doctor_id' =>'required',
            'content' => ['nullable', 'array'],
            'contentOriginal' => ['nullable', 'array']
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

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator, response()->json([
            'errors' => $validator->errors(), 'ok' => false
        ], 422));
    }



}
