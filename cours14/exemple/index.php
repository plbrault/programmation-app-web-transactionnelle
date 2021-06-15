<?php

/*
  Notre exemple n'utilise pas de base de données, et nécessite un seul contrôleur.
  On n'a donc pas de modèle, et ce script (index.php) fait directement office de contrôleur.
  C'est ce script qui détermine s'il faut afficher la vue de formulaire ou bien la vue de confirmation,
  en passant les données à celle-ci s'il y a lieu.
*/

$condimentsForType = [
  'hamburger' => ['ketchup', 'mustard', 'relish'],
  'hotdog' => ['ketchup', 'mustard', 'relish'],
  'fries' => ['salt', 'vinegar']
];

if (!empty($_POST)) {
  // Validation et transformation des données
  if (!$_POST['items']) {
    exit('items is missing.');
  }
  $items = $_POST['items'];
  foreach ($items as &$item) { // Valide individuelle de chaque item
    if (!isset($item['type'])) {
      exit('item type is missing.');
    } else if (!in_array($item['type'], ['hotdog', 'hamburger', 'fries'])) {
      exit('item type is invalid.');
    }

    if (!isset($item['condiments'])) {
      $item['condiments'] = []; /* La clé condiments ne sera pas présente si aucun condiment n'a été cochée.
                                   Dans ce cas, on l'ajoute pour éviter un `if` dans la vue. */
    }
    
    // Validation de chaque condiment
    foreach($item['condiments'] as $condiment) {
      if (!in_array($condiment, $condimentsForType[$item['type']])) {
        exit('invalid condiment.');
      }
    }

    // Conversion de pickles et cheese en booléen
    if ($item['type'] === 'hamburger') {
      $item['cheese'] = isset($item['cheese']);
      $item['pickles'] = isset($item['pickles']);
    }

    // Validation du format si le type est fries
    if ($item['type'] === 'fries') {
      if (!in_array($item['size'], ['small', 'medium', 'large'])) {
        exit('invalid fries size.');
      }
    }
  }
  unset($item);

  // Création d'un dictionnaire de textes pour la vue
  $txt = [
    'hamburger' => 'Hamburger',
    'hotdog' => 'Hot-dog',
    'fries' => 'Frites',
    'ketchup' => 'Ketchup',
    'mustard' => 'Moutarde',
    'relish' => 'Relish',
    'small' => 'Petit',
    'medium' => 'Moyen',
    'large' => 'Grand',
    'salt' => 'Sel',
    'vinegar' => 'Vinaigre'
  ];

  // Appel de la vue de confirmation
  include('views/orderConfirmation.php');
} else {
  // Appel de la vue du formulaire
  include('views/orderForm.php');
}

?>
