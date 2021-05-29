<?php

class Cours {
  // Propriétés privées
  private $code;
  private $titre;
  private $ponderation;

  // Constructeur
  function __construct($code, $titre, $ponderation) {
    if (!is_string($code)) {
      throw new Exception('Le code du cours doit être une chaîne de caractères.');
    }
    if (!is_string($titre)) {
      throw new Exception('Le titre du cours doit être une chaîne de caractères.');
    }
    if (!is_array($ponderation) || count($ponderation) != 3) {
      throw new Exception('Le titre du cours doit être un tableau de 3 éléments.');
    }

    $this->code = $code;
    $this->titre = $titre;
    $this->ponderation = array_map('intval', $ponderation); // Appelle la fonction 'intval' sur chaque élément de $ponderation et retourne le résultat
  }

  // Méthode afficher
  function afficher() {
    // La méthode a accès aux propriétés privées
    echo "[$this->code] $this->titre";
  }

  // Accesseurs

  function getCode() {
    return $this->code;
  }

  function getTitre() {
    return $this->titre;
  }

  function getPonderation() {
    return $this->ponderation;
  }
}

?>