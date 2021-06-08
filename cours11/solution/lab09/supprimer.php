<?php
  include_once('connexionBD.php');

  if (!isset($_GET['id'])) {
    echo 'Paramètre <strong>id</strong> manquant.';
    exit;
  }

  $id = intval($_GET['id']);

  $requete = $bdd->prepare('DELETE FROM series WHERE id = ?');
  $requete->execute([ $id ]);

  header('Location: /cours10/solution/lab08');
?>
