<?php

class TasksModel {
  private $db;
  
  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT id, description, is_checked FROM tasks');
    return $query->fetchAll();
  }

  function insert($description) {
    $query = $this->db->prepare('INSERT INTO tasks (description) VALUES (?) RETURNING id');
    $result = $query->execute([ $description ]);
    return $result->fetchColumn();
  }
}

?>
