<?php

/*
  Notre exemple n'utilise pas de base de données, et nécessite un seul contrôleur.
  On n'a donc pas de modèle, et ce script (index.php) fait directement office de contrôleur.
  C'est ce script qui détermine s'il faut afficher la vue de formulaire ou bien la vue de confirmation,
  en passant les données à celle-ci s'il y a lieu.
*/

if (!empty($_POST)) {
  foreach ($_POST['items'] as $item) {
    echo $item['type'] . '<br />';
    foreach ($item['condiments'] as $condiment) {
      echo $condiment . '<br />';
    }
    echo '<br />';
  }
} else {
  include('views/orderForm.php');
}

?>
