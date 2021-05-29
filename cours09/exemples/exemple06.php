<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 06
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
          /**
           * **************************** NOUVEAUTÉ ICI! **************************************************************
           * 
           * On profite du fait qu'on a créé un mutateur avec une validation pour l'utiliser dans le constructeur afin
           * que la même validation soit effectuée!
           */
          $this->setCode($code);
          
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

        // Mutateurs

        function setCode($code) {
          if (!is_string($code) || !is_numeric($code) || strlen($code) !== 9) {
            throw new Exception("Le code d'un étudiant doit être une chaîne de caractères ne contenant que des chiffres.");
          }

          $this->code = $code;
        }
      }

      if (!isset($_GET['code'])) {
        echo 'Paramètre <strong>code</strong> manquant.';
        exit;
      }

      $code = $_GET['code'];

      /*
        Un bloc Try-catch permet d'empêcher le programme de planter si des exceptions sont levées.
      */
      try {
        // On place le code susceptible de provoquer des exceptions à l'intérieur du « Try »
        $etudiant = new Etudiant($code, 'Crête', 'Stéphane');
      } catch (Exception $e) {
        // Le code placé à l'intérieur du « catch » s'exécutera uniquement si le code du « Try » provoque une exception
        echo '<p>' . $e->getMessage() . '</p>'; // getMessage est une méthode de la classe
        $etudiant = new Etudiant('000000000', 'Crête', 'Stéphane');
      }

      $etudiant->afficher();
    ?>
  </body>
</html>
