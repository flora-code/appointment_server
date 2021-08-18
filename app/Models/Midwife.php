<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Midwife extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillables = ['qualification,working_status'];
    protected $dates = ['deleted_at', 'created_at'];

//relations

public function midwives(){
    return $this->hasMany(Appointment::class);
}

public function user(){
    return $this->belongsTo(User::class);
}

//function 

public function getMidwives()
{
    $midwives = Midwife::all();

    return response()->json(['midwives' => $midwives], 200);
}

public function getMidwife($midwifeId)
{
    $midwife = Midwife::find($midwifeId);

    //if midwife is not found
    if (!$midwife) return response()->json(['error' => 'Midwife not found'], 404);

    //if appoint is found
    return response()->json(['midwife' => $midwife]);
}


public function postMidwife(Request $request)
{
    $validator = Validator::make($request->all(), [
        'qualification' => 'required',
        'working_status' => 'required',
        'user_id'=>'required'
        
    ]);
    //check if our request passses the validation we created

    if ($validator->fails()) return response()->json(['errors' => $validator->errors()]);


    //check if the user is available

    $user = User::find($request->user_id);

    if (!$user) return response()->json(['errors' => 'User not found']);


    //create an midwife

    $midwife = new Midwife();

    $midwife->working_status = $request->working_status;
    $midwife->qualification = $request->qualification;
 

    //save this midwife using a midwife-midwife relationship

    $user->midwife()->save($midwife);

    return response()->json(['midwife' => $midwife]);
}



public function putMidwife(Request $request, $midwifeId)
{
    $midwife = Midwife::find($midwifeId);

    //if midwife is not found
    if (!$midwife) return response()->json(['error' => 'Midwife not found'], 404);

    $midwife->update([
        'working_status' => $request->working_status,
        'qualification' => $request->qualification,
       
    ]);
    
    return response()->json(['midwife' => $midwife]);

}


public function deleteMidwife($midwifeId)
{
    $midwife = Midwife::find($midwifeId);

    //if midwife is not found
    if (!$midwife) return response()->json(['error' => 'Midwife not found'], 404);


    $midwife->delete();

    return response()->json(['message' => 'Midwife deleted successfully']);
}
}