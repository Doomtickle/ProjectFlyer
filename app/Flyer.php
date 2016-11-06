<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [

        'street',
        'city',
        'country',
        'state',
        'zip',
        'description',
        'price'

    ];

    public function scopeLocatedAt($query, $zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return $query->where(compact('zip', 'street'));
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
