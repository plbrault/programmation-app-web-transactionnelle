<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class RegisterController extends Controller {
  function handle(&$session, $get) {
    $errorMessage = null;
    include(__DIR__ . '/../views/register_form.php');
  }

  function handlePost(&$session, $get, $post) {
    if (
      !isset($post['username'])
      || !isset($post['first_name'])
      || !isset($post['last_name'])
      || !isset($post['password'])
      || !isset($post['password_confirm'])
    ) {
      exit;
    }

    $username = trim($post['username']);
    $firstName = trim($post['first_name']);
    $lastName = trim($post['last_name']);

    $errorMessage = null;
    $model = new UsersModel($this->db);

    if (empty($username)) {
      $errorMessage = "Le nom d'utilisateur est vide.";
    } else if (empty($firstName)) {
      $errorMessage = "Le prénom est vide.";
    } else if (empty($lastName)) {
      $errorMessage = "Le nom est vide.";
    } else if ($post['password'] !== $post['password_confirm']) {
      $errorMessage = "Les mots de passe ne concordent pas.";
    } else if ($model->getByUsername($post['username'])) {
      $errorMessage = "Le nom d'utilisateur est déjà pris.";
    }

    if ($errorMessage) {
      include(__DIR__ . '/../views/register_form.php');
    } else {
      $hashedPassword = password_hash($post['password'], PASSWORD_BCRYPT);
      $model->insert($username, $firstName, $lastName, $hashedPassword);
      include(__DIR__ . '/../views/register_confirm.php');
    }
  }

  function isRestricted() {
    return false;
  }
}

?>