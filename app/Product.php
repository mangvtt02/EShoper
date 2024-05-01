<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    public function comments()
    {
        return $this->hasMany('App\Comment', 'id_product', 'id');
    }
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_product', 'id');
    }
    
    public function type_product()
    {
        return $this->hasOne('App\Type_product', 'id', 'id_type');
    }
}
