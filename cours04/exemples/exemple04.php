<?php
  $noExemple = 1;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php
        echo 'Exemple ';
        if ($noExemple < 10) {
          echo 0;
        }
        echo $noExemple;
      ?>
    </title>
  </head>
  <body>
    <?php
      // Crée un tableau de chaînes de caractères
      $familleSimpson = ['Homer', 'Marge', 'Bart', 'Lisa', 'Maggie'];

      // Ajoute " Simpson" à chaque élément du tableau à l'aide d'une boucle For-Each
      // Remarquez l'ajout du « & », nécessaire pour pouvoir modifier les valeurs!
      foreach ($familleSimpson as &$membreFamilleSimpson) {
        $membreFamilleSimpson .= " Simpson";
      }

      /*
        Cette instruction a pour effet d'« oublier » la variable $membreFamilleSimpson, qui existe encore après la boucle.
        Cela est nécessaire pour s'éviter des problèmes à la suite d'une boucle For-Each qui utilise le symbole « & ».
        Vous allez comprendre pourquoi dans quelques cours!
      */
      unset($membreFamilleSimpson);

      // Redonne à Marge son nom de jeune fille
      $familleSimpson[1] = "Marge Bouvier";

      echo 'La famille Simpson comprend ' . count($familleSimpson) .  ' personnes: <br />';
      echo '<ul>';
      foreach ($familleSimpson as $membreFamilleSimpson) {
        echo "<li>$membreFamilleSimpson</li>";
      }
      echo '</ul>';
    ?>
  </body>
</html>
