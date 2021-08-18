<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phone_number'
    ];


    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [ 
        
        'deleted_at',
        'created_at'
];
//relations


public function midwife()
{
    return $this->hasOne(Midwife::class);
}



public function mother()
{
    return $this->hasOne(Mother::class);
}


//function


public function getUsers()
{
    $users = User::all();

    return response()->json(['users' => $users], 200);
}


public function getUser($userId)
{
    $user = User::find($userId);

    //if user is not found
    if (!$user) return response()->json(['error' => 'User not found'], 404);

    //if appoint is found
    return response()->json(['user' => $user]);
}


public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required',
        'password' => 'required',
        'email' => 'email|unique:users',
        'phone_number' => 'unique:users', 
    ]);
    //check if our request passses the validation we created

    if ($validator->fails()) return response()->json(['errors' => $validator->errors()]);


    //create an user

    $user = new User();

    $user->username = $request->username;
    $user->phone_number = $request->phone_number;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    //save this user using a midwife-user relationship

    $user ->save();

    return response()->json(['user' => $user]);
}



public function putUser(Request $request, $userId)
{
    $user = User::find($userId);

    //if user is not found
    if (!$user) return response()->json(['error' => 'User not found'], 404);

    $user->update([
        'username' => $request->username
    ]);
    
    return response()->json(['user' => $user]);

}


public function deleteUser($userId)
{
    $user = User::find($userId);

    //if user is not found
    if (!$user) return response()->json(['error' => 'User not found'], 404);


    $user->delete();

    return response()->json(['message' => 'User deleted successfully']);
}

}
