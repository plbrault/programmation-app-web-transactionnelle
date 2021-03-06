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

  function getByUsername($username) {
    $query = $this->db->prepare('SELECT id, username, first_name, last_name FROM users WHERE username = ?');
    $query->execute([ $username ]);
    return $query->fetch();
  }
}

?>