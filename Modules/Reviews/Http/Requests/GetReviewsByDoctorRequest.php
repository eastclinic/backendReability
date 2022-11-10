<?php

namespace Modules\Reviews\Http\Requests;
use App\Http\Requests\ApiListRequest;

class GetReviewsByDoctorRequest extends ApiListRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return parent::rules() + ['doctorId' => ['required', 'numeric']];
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
