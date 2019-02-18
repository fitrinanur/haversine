<?php
/**
 * Created by PhpStorm.
 * User: eggy
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;
use App\AttractionType;
use Illuminate\Support\Facades\Auth;


class typeAttractionService
{

    public function store($request)
    {
        $attractionType = new AttractionType();
        $attractionType->name = $request->name;
        $attractionType->save();

        return $attractionType;
    }

    /**
     * Update the lodging from request data into database
     * @author Eggy Endeska <eggy@hyperspace.id>
     * @param $request
     * @param $lodging
     * @return mixed
     */
    public function update($request, $attractionType)
    {
        $attractionType->name = $request->name;
        $attractionType->update();
       
        return $attractionType;

    }
}
