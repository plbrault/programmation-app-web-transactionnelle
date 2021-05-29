<!DOCTYPE html>
<html>
  <head>
    <title>
      Exemple 09
    </title>
    <style>
      table {
        width: 100%;
      }
      table, td {
        border: 1px solid;
      }
      td {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <?php
      class Tableau {
        private $nbLignes;
        private $nbColonnes;
        private $contenu = array();

        function __construct($nbLignes, $nbColonnes) {
          $this->nbLignes = intval($nbLignes);
          $this->nbColonnes = intval($nbColonnes);
        }

        function setContenu($noLigne, $noColonne, $contenu) {
          if (!isset($this->contenu[$noLigne])) {
            $this->contenu[$noLigne] = array();
          }
          $this->contenu[$noLigne][$noColonne] = $contenu;
        }

        function afficher() {
          echo '<table>';
          for ($i = 0; $i < $this->nbLignes; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $this->nbColonnes; $j++) {
              echo '<td>';
              if (isset($this->contenu[$i][$j])) {
                echo $this->contenu[$i][$j];
              } else {
                echo '&nbsp;';
              }
              echo '</td>';
            }
            echo '</tr>';
          }
          echo '</table>';
        }
      }

      $tableau = new Tableau(7, 8);

      $tableau->setContenu(3, 3, 'Salut');
      $tableau->setContenu(3, 4, 'Bonjour');

      $tableau->afficher();
    ?>
  </body>
</html>
