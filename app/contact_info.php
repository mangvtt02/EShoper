<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_info extends Model
{
    protected $table="contact_info";
    protected $primaryKey = 'id';
    protected $fillable = [
        'address','tel','fax','email'
    ];
}
