<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="order";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_customer', 'total', 'note','payment'
    ];
    public function customers(){
        return $this->hasOne('App\customers','id','id_customer');
    }
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_order','id');
    }
    
}
