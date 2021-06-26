<?php

class UsersModel {
  private $db;
  
  function __construct($db) {
    $this->db = $db;
  }

  function getHashedPassword($username) {
    $query = $this->db->prepare('SELECT hashed_password FROM users WHERE username = ?');
    $query->execute([ $username ]);
    return $query->fetchColumn();
  }
}

?>