<?php

include_once('db.php');
include_once('models/users.php');

/*
  Utilisation des variables de session pour rester connecté

  Pour tester:
  - Se connecter
  - Ouvrir la page dans un autre onglet
*/

// Démarrer le système de session. Doit absolument être appelé avant tout code HTML pour pouvoir utiliser les variables de session.
session_start();

if (isset($_SESSION['username'])) {
  // L'utilisateur est déjà connecté
  $username = $_SESSION['username'];
  include('views/connected.php');
} else if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $model = new UsersModel($db);

  $hashedPassword = $model->getHashedPassword($_POST['username']);

  if ($hashedPassword && password_verify($_POST['password'], $hashedPassword)) {
    // Le mot de passe saisi est le bon
    $_SESSION['username'] = $_POST['username'];
    include('views/login_success.php');
  } else {
    // Le mot de passe saisi est invalide, ou l'utilisateur n'existe pas
    include('views/login_error.php');
  }
} else {
  include('views/login_form.php');
}

?>
