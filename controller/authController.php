<?php

class authController{

  public $currentUser = null;

  public static function login(){
    $email = Flight::request()->data->email;
    $password = Flight::request()->data->password;

    $user = Flight::users()->getUserWithEmail($email);
    if($user == false){
      Flight::util()->render('login',['error'=>'login']);
    }else{
      if(password_verify($password, $user->password)){
        Flight::redirect("/");
      }else{
        Flight::util()->render('login',['error'=>'login']);
      }
    }
  }

}
