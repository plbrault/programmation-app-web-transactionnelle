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
          Les propriétés sont maintenant private, c'est-à-dire qu'elle sont accessibles uniquement
          aux méthodes de la classe.
        */
        private $code;
        private $nom;
        private $prenom;

        // Constructeur
        function __construct($code, $nom, $prenom) {
          $this->code = $code;
          $this->nom = $nom;
          $this->prenom = $prenom;
        }

        // Définition de la méthode afficher
        function afficher() {
          // La méthode a accès aux propriétés privées
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

      // On tente d'accéder directement à une propriété privée d'un étudiant
      echo $etudiant1->code; // Erreur!
    ?>
  </body>
</html>
