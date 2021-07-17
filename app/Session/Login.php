<?php

namespace App\Session;

class Login{

  private static function init(){
    if(session_status() !== PHP_SESSION_ACTIVE){
      session_start();
    }
  }

  public static function login($obUsusario){
    self::init();
    $_SESSION['usuario'] = [
      'id'=>$obUsusario->id,
      'nome'=>$obUsusario->nome,
      'email'=>$obUsusario->email
    ];

    header('location: index.php');
    exit;
  }

  public static function isLogged(){
    self::init();
    return isset($_SESSION['usuario']['id']);
  }

  public static function requireLogin(){
    if(!self::isLogged()){
      header('location: login.php');
      exit;
    }
  }

  public static function requireLogout(){
    if(self::isLogged()){
      header('location: index.php');
      exit;
    }
  }

}