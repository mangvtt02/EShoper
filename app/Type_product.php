<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_product extends Model
{
    protected $table="type_product";
    protected $primaryKey = 'id';
    public function product()
    {
        return $this->hasMany('App\Product', 'id_type', 'id')->where('status','Hiện')->orderBy('created_at','DESC')->limit(4);
    }
}
