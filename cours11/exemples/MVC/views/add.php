<!DOCTYPE html>
<html>
  <head>
    <title>
      Nouveau contact
    </title>
    <link rel="stylesheet" href="/cours11/exemples/MVC/style.css"> 
  </head>
  <body>
  <p>
    <a href="?action=list">Contacts</a>
      &nbsp;/&nbsp;
      Nouveau contact
    </p>          
    <h1>Nouveau contact</h1>
    <main>
      <form action="?action=add" method="POST">
        <p>
          <label for="nom_input">Nom:</label>
          <input type="text" id="nom_input" name="nom" required />
        </p>
        <p>
          <label for="prenom_input">Prénom:</label>
          <input type="text" id="prenom_input" name="prenom" required />
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

        <h2>Adresses</h2>
        <p>
          <label for="adresse_dom_input">Domicile:</label>
          <input type="text" id="adresse_dom_input" name="adresseDom" />
        </p>              
        <p>
          <label for="adresse_trv_input">Travail:</label>
          <input type="text" id="adresse_trv_input" name="adresseTrv" />              
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
    </main>
  </body>
</html>
<?php
