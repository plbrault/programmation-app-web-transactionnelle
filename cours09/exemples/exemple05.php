<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 05
    </title>
  </head>
  <body>
    <?php
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

        // Accesseurs

        function getCode() {
          return $this->code;
        }

        function getNom() {
          return $this->nom;
        }

        function getPrenom() {
          return $this->prenom;
        }

        /*
          On peut aussi créer des méthodes servant à modifier des attributs,
          que l'on appelle des **mutateurs** (**setters**).

          On en profite pour valider les modifications!
        */

        function setCode($code) {
          // On veut que le code soit une chaîne de caractères contenant 9 chiffres
          if (!is_string($code) || !is_numeric($code) || strlen($code) !== 9) {
            /*
              Ici, on "lève" (throw) une exception.

              Les exceptions (qui sont elles-mêmes des objets!) permettent d'exprimer des erreurs.
              Elle ont aussi pour effet d'interrompre l'exécution de la fonction (ou méthode) en cours.

              Si l'exception n'est pas « gérée » (voir exemple 06), elle provoquera le plantage du programme
              (dans le cas de PHP, cela signifie que l'exécution du script s'arrêtera brusquement comme si on avait
              fait un `exit`).
              
              Dans le cas d'une validation, c'est souvent ce qu'on veut, car cette erreur ne devrait survenir
              que lors du processus de développement (le programmeur doit se rendre compte de son erreur, puis la
              corriger afin qu'elle n'arrive pas en production).
            */
            throw new Exception("Le code d'un étudiant doit être une chaîne de caractères ne contenant que des chiffres.");
          }

          /*
            Ce code ne s'exécutera que si l'exception n'a pas été levée.
            On pourrait le mettre dans un `else`, mais ce n'est pas nécessaire.
          */
          $this->code = $code;
        }
      }

      // Instanciation d'un étudiant
      $etudiant = new Etudiant('200123456', 'Crête', 'Stéphane');
      
      // Ici, on tente d'appeler setCode avec une valeur invalide. Cela provoquera une exception.
      $etudiant->setCode(42);
    ?>
  </body>
</html>
