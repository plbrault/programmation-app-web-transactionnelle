<!DOCTYPE html>
<html>
  <head>
    <title>Exemple 04</title>
  </head>
  <body>
  <h1>Bonjour</h1>
  <?php
    // Une instruction se termine toujours par un point-virgule.
    echo 'Ce texte est généré par PHP.';

    /*
      Une chaîne de caractères (c'est-à-dire du texte) est placée
      entre guillemets ("") ou entre apostrophes ('')
    */
    echo "<br /><strong>PHP peut aussi utiliser des balises HTML.</strong>";

    /*
      Si je veux utiliser un apostrophe à l'intérieur d'une chaîne
      de caractères qui est entre apostrophes, je dois la précéder
      d'un '\'. On appelle cela "échapper un caractère".
    */
    echo '<br />J\'aime les chats.';

    /*
      Même chose pour les guillemets.
    */
    echo "<br />Le chat dit: \"Miaou!\"";
  ?>
  </body>
</html>
