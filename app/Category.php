<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

//    public function children()
//    {
//        return $this->hasMany('App\Category')->where('main_category_id', $this->id);
//    }

    public static function childrenOf($id)
    {
        return static::where('main_category_id', $id)->orderBy('order', 'asc')->get();
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
