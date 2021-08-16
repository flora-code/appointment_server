<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillables = ['booking_status','price','location','longitude','latitude', 'date','time','mother_id', 'midwife_id'];
    protected $dates = ['deleted_at','created_at'];


    //relations

    //function

}
