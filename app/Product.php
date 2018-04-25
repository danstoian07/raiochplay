<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture');
    }

}
