<?php

include_once(__DIR__ . '/../controller.php');
include_once(__DIR__ . '/../models/users.php');

class UserInfoController extends Controller {
  function handle(&$session, $get) {
    $username = $session['username'];

    $model = new UsersModel($this->db);
    $user = $model->get($username);

    include(__DIR__ . '/../views/user_info.php');
  }
}

?>