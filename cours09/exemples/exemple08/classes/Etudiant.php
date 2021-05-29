<?php

/*
  include_once est similaire à include, mais n'inclura pas le fichier
  si celui-ci a déjà été inclus précédemment (par exemple dans un autre fichier
  qui inclut le fichier courant)
*/
include_once('Cours.php'); /*
                             On inclut Cours puisque on l'utilise dans le code d'Etudiant,
                             cela nous assure que la classe Cours sera toujours connue
                             lorsque la classe Etudiant est connue.
                           */

class Etudiant {
  // Propriétés privées
  private $code;
  private $nom;
  private $prenom;
  private $cours = [];

  // Constructeur
  function __construct($code, $nom, $prenom) {
    $this->code = $code;
    $this->nom = $nom;
    $this->prenom = $prenom;
  }

  // Méthodes
  
  function afficher() {
    // La méthode a accès aux propriétés privées
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

  // Accesseurs

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
