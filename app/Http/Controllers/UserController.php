<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
      //variable declaration
      protected $userModel;


      //constructor
      public function __construct()
      {
          $this->userModel = new User();
      }
  
      //get users
      public function getUsers()
      {
          return $this->userModel->getUsers();
      }
  
  
      //get a single user by Id
      public function getUser($userId)
      {
          return $this->userModel->getUser($userId);
      }
  
  
      //post user to db
      public function register(Request $request)
      {
          return $this->userModel->register($request);
      }
  
  
  
      //Edit an user
      public function putUser(Request $request, $userId)
      {
          return $this->userModel->putUser($request, $userId);
      }
  
  
      //delete an user
      public function deleteUser($userId)
      {
          return $this->userModel->deleteUser(
              $userId
          );
      }
}
