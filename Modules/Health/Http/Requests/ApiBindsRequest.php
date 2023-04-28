<?php

namespace Modules\Health\Http\Requests;

use App\Http\Requests\ApiAbstractRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ApiBindsRequest extends ApiAbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + [
            'baseModel'=>['required'],
                'secondModel'=>['required'],
                'baseIds' => ['nullable'],
                'secondIds' => ['nullable'],
//                'sort.*' =>['nullable', 'string'],
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
