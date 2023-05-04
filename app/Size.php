<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table="size";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'percent', 'status',
    ];
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'id_size', 'id');
    }
   
}
