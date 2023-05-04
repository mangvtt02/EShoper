<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_blog extends Model
{
    protected $table="comment_blogs";
    protected $primaryKey = 'id';
    public function blog(){
        return $this->hasOne('App\Blog','id','id_blog');
    }
    public function users(){
        return $this->hasOne('App\User','id','id_user');
    }
}
