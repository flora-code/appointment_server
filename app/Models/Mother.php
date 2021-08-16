<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mother extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillables= [

        'gravida',
        'date_of_birth',
        
];
protected $dates = [ 
    'date_of_birth',
    'deleted_at',
    'created_at',
];

//relations

//function
}