<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 01
    </title>
  </head>
  <body>
    <?php
      // Création de la classe Etudiant
      class Etudiant {
        /*
          Voici les propriétés de la classe.
          Elles sont publiques, c'est-à-dire qu'on peut y accéder à l'extérieur de la classe.
        */
        public $code;
        public $nom;
        public $prenom;

        /*
          Voici une méthode de la classe. Les méthodes sont publiques par défaut.
        */
        function afficher() {
          /*
            Le mot-clé $this permet d'accéder à l'instance de la classe sur laquelle la méthode a été appelée.
          */
          echo "[$this->code] $this->nom, $this->prenom";
        }
      }

      // Instanciation de deux étudiants
      $etudiant1 = new Etudiant;
      $etudiant2 = new Etudiant;

      // Modification des propriétés de l'étudiant 1
      $etudiant1->code = '200123456';
      $etudiant1->nom = 'Crête';
      $etudiant1->prenom = 'Stéphane';

      // Affichage de l'étudiant 1
      $etudiant1->afficher();
      echo '<br />';

      // Modification des propriétés de l'étudiant 2
      $etudiant2->code = '207891011';
      $etudiant2->nom = 'Maynard';
      $etudiant2->prenom = 'Mélanie';

      // Affichage de l'étudiant 2
      $etudiant2->afficher();
      echo '<br />';
    ?>
  </body>
</html>
