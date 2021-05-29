<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 07
    </title>
  </head>
  <body>
    <?php
      // Création de la classe Cours
      class Cours {
        // Propriétés privées
        private $code;
        private $titre;
        private $ponderation;

        // Constructeur
        function __construct($code, $titre, $ponderation) {
          if (!is_string($code)) {
            throw new Exception('Le code du cours doit être une chaîne de caractères.');
          }
          if (!is_string($titre)) {
            throw new Exception('Le titre du cours doit être une chaîne de caractères.');
          }
          if (!is_array($ponderation) || count($ponderation) != 3) {
            throw new Exception('Le titre du cours doit être un tableau de 3 éléments.');
          }

          $this->code = $code;
          $this->titre = $titre;
          $this->ponderation = array_map('intval', $ponderation); // Appelle la fonction 'intval' sur chaque élément de $ponderation et retourne le résultat
        }

        // Méthode afficher
        function afficher() {
          // La méthode a accès aux propriétés privées
          echo "[$this->code] $this->titre";
        }
        
        // Accesseurs
        
        function getCode() {
          return $this->code;
        }

        function getTitre() {
          return $this->titre;
        }

        function getPonderation() {
          return $this->ponderation;
        }
      }

      /*
        Les classes peuvent interagir entre elles!
        Ci-dessous, un Etudiant est inscrit à des Cours.
      */

      // Création de la classe Etudiant
      class Etudiant {
        // Propriétés privées
        private $code;
        private $nom;
        private $prenom;
        private $cours = [];

        // Constructeur
        function __construct($code, $nom, $prenom) {
          $this->code = $code;
          $this->nom = $nom;
          $this->prenom = $prenom;
        }

        // Méthodes
        
        function afficher() {
          // La méthode a accès aux propriétés privées
          echo "[$this->code] $this->nom, $this->prenom";
        }

        function ajouterCours($cours) {
          if (!($cours instanceof Cours)) {
            throw new Exception('Le cours à ajouter doit être une instance de la classe Cours.');
          }

          array_push($this->cours, $cours);
        }

        function afficherCours() {
          echo '<ul>';
          foreach ($this->cours as $unCours) {
            echo '<li>';
            $unCours->afficher();
            echo '</li>';
          }
          echo '</ul>';
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

        function getCours() {
          return $this->cours;
        }
      }

      // Code principal du programme

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
