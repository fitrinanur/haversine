<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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


    
}
