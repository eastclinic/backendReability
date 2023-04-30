<?php


namespace Modules\Health\Services\ApiResponse\BindsResponses;


use Illuminate\Database\Eloquent\Builder;
use Modules\Health\Http\Requests\ApiBindsRequest;
use Modules\Health\Services\ApiResponse\ApiBindsResponseAbstract;

class DoctorService extends ApiBindsResponseAbstract
{

    public function answer()
    {


        //calc min price for every set variations
        //here absolutely need price, custom price and other data && pivot data
        //this is achieved by adding fields or additional queries
        //to distinguish variations set specials labels : f.e minPrice = true, maxPrice = true, use = true and another



        $data = $this->query->get();

        if(!$responseClass = $this->getResponseClass()) return $data->toArray(); //<<<<<<<<<<<<<<<<<<<<<<<<

        return $responseClass::collection( $data );


    }

}
