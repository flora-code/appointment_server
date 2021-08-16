<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory; 
    use SoftDeletes;

    protected $fillables= [

        'status_disbursement', 
        'appointment_id',
];
protected $dates = [ 
   
    'deleted_at',
    'created_at',
];
//relations

//function

}