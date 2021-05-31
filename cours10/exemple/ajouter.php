<!DOCTYPE html>
<html>
  <head>
    <title>
      Nouveau contact
    </title>
    <link rel="stylesheet" href="/cours10/exemple/style.css"> 
  </head>
  <body>
    <?php
      if (isset($_POST['submit'])) {

      } else {
        ?>
          <h1>Nouveau contact</h1>
          <form action="ajouter.php" method="POST">
            <p>
              <label for="nom_input">Nom:</label>
              <input type="text" id="nom_input" name="nom" />
            </p>
            <p>
              <label for="nom_input">Prénom:</label>
              <input type="text" id="prenom_input" name="prenom" />
            </p>

            <h2>Adresses</h2>
            <p>
              <label for="adresse_dom_input">Domicile:</label>
              <input type="text" id="adresse_dom_input" name="adresseDom" />
            </p>              
            <p>
              <label for="adresse_trv_input">Travail:</label>
              <input type="text" id="adresse_trv_input" name="adresseTrv" />              
            </p>

            <h2>Numéros de téléphone</h2>
            <p>
              <label for="numero_tel_dom_input">Domicile:</label>
              <input type="text" id="numero_tel_dom_input" name="numeroTelDom" />
            </p>
            <p>
              <label for="numero_tel_cel_input">Cellulaire:</label>
              <input type="text" id="numero_tel_cel_input" name="numeroTelCel" />              
            </p>                          
            <p>
              <label for="numero_tel_trv_input">Travail:</label>
              <input type="text" id="numero_tel_trv_input" name="numeroTelTrv" />              
            </p>

            <h2>Adresses courriel</h2>
            <p>
              <label for="courriel_per_input">Personnelle:</label>
              <input type="text" id="courriel_per_input" name="courrielPer" />
            </p>
            <p>
              <label for="courriel_pro_input">Professionnelle:</label>
              <input type="text" id="courriel_pro_input" name="courrielPro" />
            </p>

            <input type="submit" name="submit" value="Soumettre" />
          </form>

        <?php
      }
    ?>
  </body>
</html>
