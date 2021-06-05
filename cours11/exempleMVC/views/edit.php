<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= 'Modifier « ' . $contact['last_name']  . ', ' . $contact['first_name'] . ' »' ?>
    </title>
    <link rel="stylesheet" href="/cours11/exempleMVC/public/style.css"> 
  </head>
  <body>
  <p>
    <a href="?action=list">Contacts</a>
      &nbsp;/&nbsp;
      <?= $contact['last_name'] . ', ' . $contact['first_name'] ?>
    </p>
    <h1><?= 'Modifier « ' . $contact['last_name']  . ', ' . $contact['first_name'] . ' »' ?></h1>
    <p>
      <a href="?action=display&id=<?= $contact['id'] ?>">Annuler</a>
    </p>          
    <main>
      <form action="?action=edit&id=<?= $contact['id'] ?>" method="POST">
        <p>
          <label for="lastName_input">Nom:</label>
          <input type="text" id="lastName_input" name="nom" value="<?= $contact['last_name'] ?>" required />
        </p>
        <p>
          <label for="lastName_input">Prénom:</label>
          <input type="text" id="firstName_input" name="prenom" value="<?= $contact['first_name'] ?>" required />
        </p>

        <h2>Numéros de téléphone</h2>
        <p>
          <label for="numero_tel_dom_input">Domicile:</label>
          <input type="text" id="numero_tel_dom_input" name="numeroTelDom" value="<?= isset($phoneNumbers['DOM']) ? $phoneNumbers['DOM'] : '' ?>" />
        </p>
        <p>
          <label for="numero_tel_cel_input">Cellulaire:</label>
          <input type="text" id="numero_tel_cel_input" name="numeroTelCel" value="<?= isset($phoneNumbers['CEL']) ? $phoneNumbers['CEL'] : '' ?>" />              
        </p>                          
        <p>
          <label for="numero_tel_trv_input">Travail:</label>
          <input type="text" id="numero_tel_trv_input" name="numeroTelTrv" value="<?= isset($phoneNumbers['TRV']) ? $phoneNumbers['TRV'] : '' ?>" />              
        </p>

        <h2>Adresses</h2>
        <?php
        ?>
        <p>
          <label for="adresse_dom_input">Domicile:</label>
          <input type="text" id="adresse_dom_input" name="adresseDom" value="<?= isset($addresses['DOM']) ? $addresses['DOM'] : '' ?>" />
        </p>              
        <p>
          <label for="adresse_trv_input">Travail:</label>
          <input type="text" id="adresse_trv_input" name="adresseTrv" value="<?= isset($addresses['TRV']) ? $addresses['TRV'] : '' ?>" />              
        </p>

        <h2>Adresses courriel</h2>
        <p>
          <label for="courriel_per_input">Personnelle:</label>
          <input type="text" id="courriel_per_input" name="courrielPer" value="<?= isset($emailAddresses['PER']) ? $emailAddresses['PER'] : '' ?>" />
        </p>
        <p>
          <label for="courriel_pro_input">Professionnelle:</label>
          <input type="text" id="courriel_pro_input" name="courrielPro" value="<?= isset($emailAddresses['PRO']) ? $emailAddresses['PRO'] : '' ?>" />
        </p>
        
        <input type="submit" name="submit" value="Soumettre" />
      </form>
    </main>
  </body>
</html>
