<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table="topping";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'price', 'status',
    ];
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_topping', 'id');
    }
}
