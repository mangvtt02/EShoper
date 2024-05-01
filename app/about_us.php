<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class about_us extends Model
{
    protected $table="about_us";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title','image','content','status'
    ];
}
