<?php

class TasksModel {
  private $db;
  
  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT id, description, is_checked FROM tasks ORDER BY id');
    return $query->fetchAll();
  }

  function get($id) {
    $query = $this->db->prepare('SELECT id, description, is_checked FROM tasks WHERE id = ?');
    $query->execute([$id]);
    return $query->fetch();
  }

  function insert($description) {
    $query = $this->db->prepare('INSERT INTO tasks (description) VALUES (?) RETURNING id');
    $result = $query->execute([ $description ]);
    return $result->fetchColumn();
  }

  function update($id, $description, $isChecked) {
    $query = $this->db->prepare('UPDATE tasks SET description = ?, is_checked = ? WHERE id = ?');
    $query->execute([ $description, $isChecked, intval($id) ]);
  }
}

?>
