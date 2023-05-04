<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table="order_detail";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_order', 'id_product', 'id_size','id_topping','quantity','price'
    ];
    public function order()
    {
        return $this->hasOne('App\Order', 'id','id_order');
    }
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'id_product');
    }
    public function size()
    {
        return $this->hasOne('App\Size', 'id','id_size');
    }
    public function topping()
    {
        return $this->hasOne('App\Topping', 'id', 'id_topping');
    }
}
