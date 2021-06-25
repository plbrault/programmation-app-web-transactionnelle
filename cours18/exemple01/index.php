<?php

include_once('db.php');
include_once('models/users.php');

/*
  Algorithme d'authentification vue durant la théorie:

  1 - Lire les informations d'authentification transmises en POST
  2 - Récupérer depuis la BD le mot de passe haché correspondant au nom d'utilisateur saisi
  3 - Valider le mot de passe saisi avec password_verify 
*/

if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $model = new UsersModel($db);

  $hashedPassword = $model->getHashedPassword($_POST['username']);

  if ($hashedPassword && password_verify($_POST['password'], $hashedPassword)) {
    // Le mot de passe saisi est le bon
    include('views/login_success.php');
  } else {
    // Le mot de passe saisi est invalide, ou l'utilisateur n'existe pas
    include('views/login_error.php');
  }
} else {
  include('views/login_form.php');
}

?>
