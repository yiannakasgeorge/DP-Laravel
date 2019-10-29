<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        // 'id',
        'title',
        'section',
        'active',
        'content',
        'image',
        'added_on',
        'updated_on',
   
    ];
}



