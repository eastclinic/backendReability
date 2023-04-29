<?php

namespace Modules\Health\Http\Requests;

use App\Http\Requests\ApiAbstractRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Modules\Health\Services\GraphRelations;

class ApiBindsRequest extends ApiAbstractRequest
{
    protected GraphRelations $graphRelations;

    public function __construct(GraphRelations $graphRelations) {
        $this->graphRelations = $graphRelations;
        //parent::__construct();
    }
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

    public function getBaseModel() {
        $bm = $this->input('baseModel');
        return $this->graphRelations->getModelByAlias($this->input('baseModel'));
    }

    public function getTargetModel() {
        $targetModel = $this->graphRelations->getModelByAlias($this->input('secondModel'));
        return $this->graphRelations->getRelationsMethod($targetModel);
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
