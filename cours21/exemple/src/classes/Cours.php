<?php

/**
 * Représente un cours avec son code, son titre et sa pondération.
 */
class Cours {
  private $code;
  private $titre;
  private $ponderation;

  /**
   * Constructeur de la classe Cours.
   * 
   * @param string $code Le code du cours, ex: '420-715-FE'.
   * @param string $titre Le titre du cours, ex: "Programmation d'une application Web transactionnelle".
   * @param int[] $ponderation Un tableau de trois entiers indiquant le nombre d'heures de théorie,
   *                           le nombre d'heures de laboratoire et le nombre d'heures de travail 
   *                           à la maison.
   */
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

  /**
   * Affiche le cours à l'écran, au format "[code] titre".
   */
  function afficher() {
    echo "[$this->code] $this->titre";
  }

  /**
   * Récupère le code du cours.
   * 
   * @return string
   */
  function getCode() {
    return $this->code;
  }

  /**
   * Récupère le titre du cours.
   * 
   * @return string
   */
  function getTitre() {
    return $this->titre;
  }

  /**
   * Récupère la pondération du cours.
   * 
   * @return int[]
   */
  function getPonderation() {
    return $this->ponderation;
  }
}

?>