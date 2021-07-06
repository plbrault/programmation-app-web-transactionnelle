<?php

include_once('Cours.php');

/**
 * Représente un.e étudiant.e avec son code, son nom, son prénom et la liste de ses cours.
 */
class Etudiant {
  private $code;
  private $nom;
  private $prenom;
  private $cours = [];

  /**
   * Constructeur d'Etudiant.
   * 
   * @param string $code Le code de l'étudiant, ex: '202012345'.
   * @param string $nom Le nom de l'étudiant.
   * @param string $prenom Le prénom de l'étudiant.
   */
  function __construct($code, $nom, $prenom) {
    $this->code = $code;
    $this->nom = $nom;
    $this->prenom = $prenom;
  }
  
  /**
   * Affiche l'étudiant à l'écran au format "[code] nom, prenom".
   */
  function afficher() {
    echo "[$this->code] $this->nom, $this->prenom";
  }

  /**
   * Ajoute un cours à la liste de cours de l'étudiant.
   * 
   * @param Cours $cours Le cours à ajouter.
   */
  function ajouterCours($cours) {
    if (!($cours instanceof Cours)) {
      throw new Exception('Le cours à ajouter doit être une instance de la classe Cours.');
    }

    array_push($this->cours, $cours);
  }

  /**
   * Affiche à l'écran la liste des cours de l'étudiant dans une liste non ordonnée.
   */
  function afficherCours() {
    echo '<ul>';
    foreach ($this->cours as $unCours) {
      echo '<li>';
      $unCours->afficher();
      echo '</li>';
    }
    echo '</ul>';
  }

  /**
   * Récupère le code de l'étudiant.
   * 
   * @return string
   */
  function getCode() {
    return $this->code;
  }

  /**
   * Récupère le nom de l'étudiant.
   * 
   * @return string
   */
  function getNom() {
    return $this->nom;
  }

  /**
   * Récupère le prénom de l'étudiant.
   * 
   * @return string
   */
  function getPrenom() {
    return $this->prenom;
  }

  /**
   * Récupère la liste des cours de l'étudiant.
   * 
   * @return Cours[]
   */
  function getCours() {
    return $this->cours;
  }
}

?>
