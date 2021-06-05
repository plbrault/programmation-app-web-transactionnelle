<?php

/*
  Une classe abstraite est une classe qui ne peut pas être instancée directement.
  On peut seulement créer des classes héritant de celle-ci.
*/
abstract class Controller {
  protected $db; // La portée protected permet aux classes filles (qui héritent de celle-ci) d'accéder à cette propriété

  function __construct($db) {
    $this->db = $db;
  }

  /*
    Une méthode abstraite est une méthode que les classes filles doivent absolument définir.
  */
  abstract function invoke();
}

?>