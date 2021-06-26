<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class LoginController extends Controller {
  function handle(&$session, $get) {
    include(__DIR__ . '/../views/login_form.php');
  }

  function handlePost(&$session, $get, $post) {
    $model = new UsersModel($this->db);

    $hashedPassword = $model->getHashedPassword($post['username']);
  
    if ($hashedPassword && password_verify($post['password'], $hashedPassword)) {
      // Le mot de passe saisi est le bon
      $session['username'] = $post['username'];
      include('views/login_success.php');
    } else {
      // Le mot de passe saisi est invalide, ou l'utilisateur n'existe pas
      include('views/login_error.php');
    }
  }
}

?>