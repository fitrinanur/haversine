<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttractionType extends Model
{
    
    protected $fillable = [
        'name'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }
}
