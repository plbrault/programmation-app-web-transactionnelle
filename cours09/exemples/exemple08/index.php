<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 08
    </title>
  </head>
  <body>
    <?php
      include_once('classes/Cours.php');
      include_once('classes/Etudiant.php');
   
      $cours1 = new Cours('420-705-FE', 'Programmation des interfaces Web', [2, 3, 2]);
      $cours2 = new Cours('420-7A4-FE', 'Environnement Web', [2, 2, 2]);
      $cours3 = new Cours('420-7B4-FE', 'Exploitation d’une base de données', [2, 2, 2]);
      $cours4 = new Cours('420-715-FE', 'Programmation d’une application Web transactionnelle', [2, 3, 2]);
      $cours5 = new Cours('420-7A3-FE', 'Modification d’un système existant', [1, 2, 2]);
      $cours6 = new Cours('420-706-FE', 'Projet intégrateur', [1, 5, 2]);

      $etudiant = new Etudiant('191234567', 'Desrochers', 'Alfred');

      $etudiant->ajouterCours($cours1);
      $etudiant->ajouterCours($cours2);
      $etudiant->ajouterCours($cours3);

      echo '<h1>Étudiant</h1>';
      $etudiant->afficher();
      echo '<h2>Liste des cours:</h2>';
      $etudiant->afficherCours();
    ?>
  </body>
</html>
