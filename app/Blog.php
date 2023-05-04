<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table="blog";
    protected $primaryKey = 'id';
    public function comment_blogs(){
        return $this->hasMany('App\Comment_blog','id_blog','id');
    }
}
