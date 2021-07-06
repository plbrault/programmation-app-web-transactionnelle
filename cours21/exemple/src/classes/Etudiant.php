<?php

include_once('Cours.php');

class Etudiant {
  private $code;
  private $nom;
  private $prenom;
  private $cours = [];

  function __construct($code, $nom, $prenom) {
    $this->code = $code;
    $this->nom = $nom;
    $this->prenom = $prenom;
  }
  
  function afficher() {
    echo "[$this->code] $this->nom, $this->prenom";
  }

  function ajouterCours($cours) {
    if (!($cours instanceof Cours)) {
      throw new Exception('Le cours à ajouter doit être une instance de la classe Cours.');
    }

    array_push($this->cours, $cours);
  }

  function afficherCours() {
    echo '<ul>';
    foreach ($this->cours as $unCours) {
      echo '<li>';
      $unCours->afficher();
      echo '</li>';
    }
    echo '</ul>';
  }

  function getCode() {
    return $this->code;
  }

  function getNom() {
    return $this->nom;
  }

  function getPrenom() {
    return $this->prenom;
  }

  function getCours() {
    return $this->cours;
  }
}

?>
