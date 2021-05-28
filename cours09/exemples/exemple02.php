<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 02
    </title>
  </head>
  <body>
    <?php
      // Création de la classe Etudiant
      class Etudiant {
        // Propriétés
        public $code;
        public $nom;
        public $prenom;

        /*
          Voici un constructeur.
          Un constructeur est une méthode spéciale qui est appelée à la création d'une instance de la classe.
          Il permet notamment d'initialiser des propriétés de l'objet.
        */
        function __construct($code, $nom, $prenom) {
          $this->code = $code;
          $this->nom = $nom;
          $this->prenom = $prenom;
        }

        // Définition de la méthode afficher
        function afficher() {
          echo "[$this->code] $this->nom, $this->prenom";
        }
      }

      // Instanciation de deux étudiants en passant des paramètres au constructeur
      $etudiant1 = new Etudiant('200123456', 'Crête', 'Stéphane');
      $etudiant2 = new Etudiant('207891011', 'Maynard', 'Mélanie');

      // Affichage de l'étudiant 1
      $etudiant1->afficher();
      echo '<br />';

      // Affichage de l'étudiant 2
      $etudiant2->afficher();
    ?>
  </body>
</html>
