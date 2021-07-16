<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

Login::requireLogout();

if(isset($_POST['acao'])){

  switch($_POST['acao']){

    case 'logar':
      break;

    case 'cadastrar':
      if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){

        $obUsuario = new Usuario();
        $obUsuario->nome = $_POST['nome'];
        $obUsuario->email = $_POST['email'];
        $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $obUsuario->cadastrar();

      }
      break;
  }

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario-login.php';
include __DIR__.'/includes/footer.php';