<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Attraction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'phone_number',
        'description',
    ];

    public function attractionType()
    {
        return $this->belongsTo(AttractionType::class);
    }

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'pictureable');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeLocation(Builder $query, $latitude, $longitude, $radius = 30){
        $haversine = '( 6371 * acos( cos( radians('.$latitude.') ) *
			         cos( radians( latitude ) )
			         * cos( radians( longitude ) - radians('.$longitude.')
			         ) + sin( radians('.$latitude.') ) *
			         sin( radians( latitude ) ) )
			       ) AS distance';
        $where =   "ROUND(( 10  * 6371 * acos( cos( radians('$latitude') ) * "
            . "cos( radians(latitude) ) * "
            . "cos( radians(longitude) - radians('$longitude') ) + "
            . "sin( radians('$latitude') ) * "
            . "sin( radians(latitude) ) ) ) ,8) <=". $radius
            .' and latitude IS NOT NULL';
        return $query->select('attractions.*')
            ->selectRaw($haversine)
            ->whereRaw($where)
            ->orderBy('distance');
    }

}
