<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    protected $fillable = [
        'title',
        'description',
        'hiringOrganization',
        'jobLocation',
        'validThrough',
        'datePosted',
        'optionalFilds',
    ];


    protected $dates = [
        'validThrough',
        'datePosted',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/vacants/'.$this->getKey());
    }
}
