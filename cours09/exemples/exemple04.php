<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 04
    </title>
  </head>
  <body>
    <?php
      /*
        En général, on déclare les propriétés comme étant **privées**
        et les méthodes comme étant **publiques**.

        Cette façon de faire permet de protéger l'accès aux propriétés.

        C'est ce qu'on appelle l'**encapsulation**.
      */

      // Création de la classe Etudiant
      class Etudiant {
        // Propriétés privées
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

        /*
          Il est de pratique courante de créer des méthodes servant à accéder
          à certains attributs. On appelle ces méthodes des **accesseurs** (ou **getters** en anglais).
        */

        function getCode() {
          return $this->code;
        }

        function getNom() {
          return $this->nom;
        }

        function getPrenom() {
          return $this->prenom;
        }
      }

      // Instanciation d'un étudiant
      $etudiant = new Etudiant('200123456', 'Crête', 'Stéphane');

      /*
        Utilisation des accesseurs pour accéder aux attributs de l'objet.
        Je peux accéder aux attributs, mais pas les modifier!
      */
      echo $etudiant->getCode() . '<br />' .
        $etudiant->getNom() . '<br />' .
        $etudiant->getPrenom() . '<br />'
      ;
    ?>
  </body>
</html>
