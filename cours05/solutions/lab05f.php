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
  );
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Laboratoire 05 (F)</title>
    <style>
     fieldset {
        background: #eee;
        padding: 1.2em;
        margin: 10px;
     } 

     .groupe-champs-textes {
        display: grid;
        grid-template-columns: auto 1fr auto 1fr;
        grid-row-gap: 0.8em;
        grid-column-gap: 3em;
      }

      .groupe-reserver {
        display: grid;
        grid-template-columns: auto;
      }

    </style>
  </head>
  <body>
    <?php
      $afficherFormulaire = true;
      
      if (isset($_POST['submit'])) {
        if (!isset($_POST['province']) || !isset($provinces[$_POST['province']])) {
          exit;
        }
        if (!isset($_POST['adultes']) || !is_numeric($_POST['adultes']) || !is_int(+$_POST['adultes'])) {
          exit;
        }
        if (!isset($_POST['adultes']) || !is_numeric($_POST['enfants']) || !is_int(+$_POST['enfants'])) {
          exit;
        }
        if (!isset($_POST['nombreNuits']) || !is_numeric($_POST['nombreNuits']) || !is_int(+$_POST['nombreNuits'])) {
          exit;
        }
        if (
          !isset($_POST['prenom']) || !isset($_POST['nom']) || !isset($_POST['adresse'])
          || !isset($_POST['ville']) || !isset($_POST['codePostal']) || !isset($_POST['telephone'])
          || !isset($_POST['courriel']) || !isset($_POST['typeChambre']) || !isset($_POST['dateArrivee'])
        ) {
          exit;
        }

        $dateArrivee = htmlspecialchars($_POST['dateArrivee']);
        $nombreNuits = $_POST['nombreNuits'];
        $typeChambre = htmlspecialchars($_POST['typeChambre']);
        $nombreAdultes = $_POST['adultes'];
        $nombreEnfants = $_POST['enfants'];

        echo '<h1>Confirmation</h1>';
        echo '<p>Votre réservation a été effectuée avec succès.</p>';
        echo "<p><strong>Date d'arrivée:</strong> $dateArrivee</p>";
        echo "<p><strong>Nombre de nuits:</strong> $nombreNuits</p>";
        echo "<p><strong>Type de chambre:</strong> $typeChambre</p>";
        echo "<p><strong>Nombre d'adultes:</strong> $nombreAdultes</p>";
        echo "<p><strong>Nombre d'enfants:</strong> $nombreEnfants</p>";

      } else {
        ?>
          
        <h1>Formulaire de réservation</h1>
        <form action="lab05f.php" method="POST">
          <fieldset class="groupe-champs-textes">
            <legend>Informations personnelles</legend>
            
              <label for="prenom-input">Prénom:</label>
              <input type="text" id="prenom-input" name="prenom" required />
        
              <label for="nom-input">Nom:</label>
              <input type="text" id="nom-input" name="nom" required />
           
              <label for="adresse-input">Adresse:</label>
              <input type="text" id="adresse-input" name="adresse" required />
           
              <label for="ville-input">Ville:</label>
              <input type="text" id="ville-input" name="ville" required />
            
              <label for="province-select">Province / Territoire:</label>
              <select id="province-select" name="province">
                <option value="">Sélectionner une province</option>
                <?php
                  foreach ($provinces as $code => $nomProvince) {
                    echo "<option value=\"$code\">$nomProvince</option>";
                  }
                ?>
              </select>
      
              <label for="code-postal-input">Code postal:</label>
              <input type="text" id="code-postal-input" name="codePostal" required />
        
              <label for="telephone-input">Numéro de téléphone:</label>
              <input type="text" id="telephone-input" name="telephone" required />
         
              <label for="courriel-input">Adresse courriel:</label>
              <input type="text" id="courriel-input" name="courriel" required />
                                                                                                  
          </fieldset>
          <fieldset>
            <legend>Type de chambre</legend>
            
            <input type="radio" id="type-chambre-1-input" name="typeChambre" value="1 lit double" required />
            <label for="type-chambre-1-input">1 lit double</label>

            <input type="radio" id="type-chambre-2-input" name="typeChambre" value="2 lits doubles" required />
            <label for="type-chambre-2-input">2 lits doubles</label>

            <input type="radio" id="type-chambre-3-input" name="typeChambre" value="1 lit Queen" required />
            <label for="type-chambre-3-input">1 lit Queen</label>

            <input type="radio" id="type-chambre-4-input" name="typeChambre" value="2 lits Queen" required />
            <label for="type-chambre-4-input">2 lits Queen</label>
            
            <input type="radio" id="type-chambre-5-input" name="typeChambre" value="1 lit King" required />
            <label for="type-chambre-5-input">1 lit King</label>            
          </fieldset>
          <fieldset class="groupe-champs-textes">
            <legend>Invités</legend>

            <label for="nombre-adultes-input">Nombre d'adultes: </label>
            <input type="number" id="nombre-adultes-input" name="adultes" value="0" />

            <label for="nombre-enfants-input">Nombre d'enfants: </label>
            <input type="number" id="nombre-enfants-input" name="enfants" value="0" />
          </fieldset>
          <fieldset class="groupe-champs-textes">
            <legend>Dates</legend>

            <label for="date-arrivee-input">Date d'arrivée (JJ/MM/AAAA): </label>
            <input type="text" id="date-arrivee-input" name="dateArrivee" required />

            <label for="nombre-nuits-input">Nombre de nuits: </label>
            <input type="number" id="nombre-nuits-input" name="nombreNuits" value="1" />
          </fieldset>          

          <fieldset class="groupe-reserver">
            <input type="submit" name="submit" value="Réserver" />
          </fieldset>
        </form>

        <?php
      }
    ?>
  </body>
</html>