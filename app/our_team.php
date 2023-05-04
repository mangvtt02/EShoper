<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class our_team extends Model
{
    protected $table="our_team";
    protected $primaryKey = 'id';
    protected $fillable = [
        'image','name','position','introduce'
    ];
}
