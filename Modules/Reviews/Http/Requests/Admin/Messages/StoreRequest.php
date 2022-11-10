<?php

namespace Modules\Reviews\Http\Requests\Admin\Messages;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'review_id' =>['required', 'numeric'],
            'parent_id' =>'nullable',

            'author_id' =>['required', 'numeric'],
            'author' => 'nullable',
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
            'review_id.required' => 'review_id is required info',
            'review_id.numeric' => 'review_id must be integer',
            'author_id.numeric' => 'author_id must be integer',
            'author_id.required' => 'review_id is required info',
//            'rating.required' => 'Be sure to specify id of review target',
        ];
    }
}
