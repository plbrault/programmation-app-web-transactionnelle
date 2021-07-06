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

  function insert($username, $firstName, $lastName, $hashedPassword) {
    $query = $this->db->prepare('INSERT INTO users(username, first_name, last_name, hashed_password) VALUES(?, ?, ?, ?)');
    $query->execute([ $username, $firstName, $lastName, $hashedPassword ]);
  }
}

?>