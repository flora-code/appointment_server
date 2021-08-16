<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Midwife extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillables = ['qualification,working_status'];
    protected $dates = ['deleted_at', 'created_at'];

//relations

//function
}