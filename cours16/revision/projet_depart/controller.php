<?php

/*
  Une classe abstraite est une classe qui ne peut pas être instanciée directement.
  On peut seulement créer des classes héritant de celle-ci.
*/
abstract class Controller {
  protected $db; // La portée protected permet aux classes filles (qui héritent de celle-ci) d'accéder à cette propriété

  function __construct($db) {
    $this->db = $db;
  }

  /*
    Une méthode abstraite est une méthode que les classes filles doivent absolument définir.

    Le paramètre $get contiendra les données reçues dans l'URL.
  */
  abstract function handle($get);

  /*
    Cette méthode sera appelée si des données ont été reçues en POST.

    Le paramètre $get recevra les données reçues dans l'URL.
    Le paramètre $post recevra les données reçues en POST (d'un formulaire).
  */
  function handlePost($get, $post) {}
}

?>