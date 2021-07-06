<?php

class Cours {
  private $code;
  private $titre;
  private $ponderation;

  function __construct($code, $titre, $ponderation) {
    if (!is_string($code)) {
      throw new Exception('Le code du cours doit être une chaîne de caractères.');
    }
    if (!is_string($titre)) {
      throw new Exception('Le titre du cours doit être une chaîne de caractères.');
    }
    if (!is_array($ponderation) || count($ponderation) != 3) {
      throw new Exception('La pondération du cours doit être un tableau de 3 éléments.');
    }

    $this->code = $code;
    $this->titre = $titre;
    $this->ponderation = array_map('intval', $ponderation); // Appelle la fonction 'intval' sur chaque élément de $ponderation et retourne le résultat
  }

  function afficher() {
    echo "[$this->code] $this->titre";
  }

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