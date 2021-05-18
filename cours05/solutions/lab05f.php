<?php
  $provinces = array(
    'AB' => 'Alberta',
    'BC' => 'Colombie-Britannique',
    'PE' => 'Île-du-Prince-Édouard',
    'MB' => 'Manitoba',
    'NB' => 'Nouveau-Brunswick',
    'QC' => 'Québec',
    'NS' => 'Nouvelle-Écosse',
    'NU' => 'Nunavut',
    'ON' => 'Ontario',
    'SK' => 'Saskatchewan',
    'NL' => 'Terre-Neuve-et-Labrador',
    'NT' => 'Territoires du Nord-Ouest',
    'YT' => 'Yukon'
  )
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 05 (F)</title>
    <style>
      fieldset {
        display: grid;
        grid-template-columns: auto 1fr auto 1fr;
        grid-row-gap: 0.8em;
        grid-column-gap: 3em;
        background: #eee;
        padding: 1.2em;
      }

    </style>
  </head>
  <body>
    <?php
      $afficherFormulaire = true;
      
      if (isset($_POST['submit'])) {
        $motDePasse = $_POST['motDePasse'];
        if ($motDePasse === 'abricot') {
          echo 'Bravo! Vous avez trouvé le mot de passe!';
          $afficherFormulaire = false;
        } else {
          echo 'Mauvais mot de passe.';
        }
      } else {
        ?>
          
        <h1>Formulaire de réservation</h1>
        <form action="lab05f.php" method="POST">
          <fieldset>
            <legend>Informations personnelles</legend>
            
              <label for="prenom-input">Prénom:</label>
              <input type="text" id="prenom-input" name="prenom" />
        
              <label for="nom-input">Nom:</label>
              <input type="text" id="nom-input" name="nom" />
           
              <label for="adresse-input">Adresse:</label>
              <input type="text" id="adresse-input" name="adresse" />
           
              <label for="ville-input">Ville:</label>
              <input type="text" id="ville-input" name="ville" />
            
              <label for="province-select">Province / Territoire:</label>
              <select id="province-select" name="province">
                <?php
                  foreach ($provinces as $code => $nomProvince) {
                    echo "<option value=\"$code\">$nomProvince</option>";
                  }
                ?>
              </select>
      
              <label for="code-postal-input">Code postal:</label>
              <input type="text" id="code-postal-input" name="codePostal" />
        
              <label for="telephone-input">Numéro de téléphone:</label>
              <input type="text" id="telephone-input" name="telephone" />
         
              <label for="courriel-input">Adresse courriel:</label>
              <input type="text" id="courriel-input" name="courriel" />
                                                                                                  
          </fieldset>
          <fieldset>
            <legend>Type de chambre</legend>
            
          </fieldset>
        </form>

        <?php
      }
    ?>
  </body>
</html>