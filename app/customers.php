<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    
    protected $table="customers";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'address','phone_nb','note'
    ];
    public function order(){
        return $this->hasMany('App\Order','id_customer','id');
    }
    
}
