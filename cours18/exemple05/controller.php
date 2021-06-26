<?php

abstract class Controller {
  protected $db; // La portée protected permet aux classes filles (qui héritent de celle-ci) d'accéder à cette propriété

  function __construct($db) {
    $this->db = $db;
  }
  
  abstract function handle(&$session, $get);

  function handlePost(&$session, $get, $post) {}

  /*
    Les classes filles devront implanter cette méthode.
    Elle devra retourner true pour les pages nécessitant d'être authentifié pour y accéder,
    et false pour les pages publiques.
  */
  abstract function isRestricted();
}

?>