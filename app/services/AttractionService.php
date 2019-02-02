<?php
/**
 * Created by PhpStorm.
 * User: eggy
 * Date: 10/25/18
 * Time: 3:58 PM
 */
namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Models\City;
use App\Attraction;
use App\AttractionType;
use Illuminate\Support\Facades\Auth;


class AttractionService
{

    public function store($request)
    {
        $attraction = new Attraction();
        $attraction->name = $request->name;
        $attraction->save();

        return $attraction;
    }

    /**
     * Update the lodging from request data into database
     * @author Eggy Endeska <eggy@hyperspace.id>
     * @param $request
     * @param $lodging
     * @return mixed
     */
    public function update($request, $attraction)
    {
        $attraction->name = $request->name;
        $attraction->update();
       
        return $attraction;

    }
}
