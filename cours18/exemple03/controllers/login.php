<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class LoginController extends Controller {
  function handle(&$session, $get) {
    include(__DIR__ . '/../views/login_form.php');
  }

  function handlePost(&$session, $get, $post) {
    $model = new UsersModel($this->db);

    $hashedPassword = $model->getHashedPassword($_POST['username']);
  
    if ($hashedPassword && password_verify($_POST['password'], $hashedPassword)) {
      // Le mot de passe saisi est le bon
      $session['username'] = $_POST['username'];
      include('views/login_success.php');
    } else {
      // Le mot de passe saisi est invalide, ou l'utilisateur n'existe pas
      include('views/login_error.php');
    }
  }
}

?>