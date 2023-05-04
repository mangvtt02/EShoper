<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comment";
    protected $primaryKey = 'id';
        public function users()
        {
            return $this->hasOne('App\User', 'id', 'id_user');
        }
        
        public function product()
        {
            return $this->hasOne('App\Product',  'id','id_product');
        }
}
