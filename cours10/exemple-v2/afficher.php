<?php
  include_once('connexionBD.php');

  if (!isset($_GET['id'])) {
    echo 'Paramètre <strong>id</strong> manquant.';
    exit;
  }

  $idContact = intval($_GET['id']);

  /*
    CONTRE-EXEMPLE

    Éviter d'inclure directement des variables provenant du client dans une requête SQL,
    car cela peut créer des risques d'injection SQL. Dans notre cas, on s'est déjà
    prémuni contre ce risque avec la fonction `intval`, mais ça reste une bonne habitude
    à prendre de toujours éviter cette façon de faire.
  */
  // $reponse = $bdd->query("SELECT nom, prenom FROM contacts WHERE id = $idContact");
  
  /*
    On utilise plutôt les requêtes préparées, qui éliminent le risque d'injection SQL.
  */
  $requete = $bdd->prepare('SELECT nom, prenom FROM contacts WHERE id = ?');
  $requete->execute(array($idContact));
  
  $contact = $requete->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= $contact['nom'] ?>, <?= $contact['prenom'] ?>
    </title>
    <link rel="stylesheet" href="/cours10/exemple-v2/style.css"> 
  </head>
  <body>
    <p>
      <a href="/cours10/exemple-v2/">Contacts</a>
      &nbsp;/&nbsp;
      <?= $contact['nom'] . ', ' . $contact['prenom'] ?>
    </p>
    <h1><?= $contact['nom'] . ', ' . $contact['prenom'] ?></h1>   
    
    <p>
      <a href="modifier.php?id=<?= $idContact ?>">
        ✏️
      </a>
      &nbsp;
      <a
        onclick="return confirm('Voulez-vous vraiment supprimer le contact « <?= $contact['nom'] . ', ' . $contact['prenom'] ?> » ?')"
        href="supprimer.php?id=<?= $idContact ?>"
      >
        ❌
      </a>
    </p>

    <main>
      <h2>Numéros de téléphone</h2>
      <?php
        $requete = $bdd->prepare('SELECT numero_tel, types_numero_tel.description FROM numeros_tel JOIN types_numero_tel ON types_numero_tel.code = numeros_tel.type_numero_tel WHERE contact_id = ?');
        $requete->execute(array($idContact));

        if ($requete->rowCount() > 0) {
          echo '<ul>';
          foreach ($requete as $donneesNumeroTel) {
            echo '<li><strong>'
              . $donneesNumeroTel['description']
              . ': </strong>'
              . $donneesNumeroTel['numero_tel']
              . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>Aucun</p>';
        }
      ?>

      <h2>Adresses</h2>
      <?php
        $requete = $bdd->prepare('SELECT adresse, types_adresse.description FROM adresses JOIN types_adresse ON types_adresse.code = adresses.type_adresse WHERE contact_id = ?');
        $requete->execute(array($idContact));

        if ($requete->rowCount() > 0) {
          echo '<ul>';
          foreach ($requete as $donneesNumeroTel) {
            echo '<li><strong>'
              . $donneesNumeroTel['description']
              . ': </strong>'
              . $donneesNumeroTel['adresse']
              . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>Aucun</p>';
        }
      ?>

      <h2>Adresses courriel</h2>
      <?php
        $requete = $bdd->prepare('SELECT courriel, types_courriel.description FROM courriels JOIN types_courriel ON types_courriel.code = courriels.type_courriel WHERE contact_id = ?');
        $requete->execute(array($idContact));

        if ($requete->rowCount() > 0) {
          echo '<ul>';
          foreach ($requete as $donneesNumeroTel) {
            echo '<li><strong>'
              . $donneesNumeroTel['description']
              . ': </strong>'
              . $donneesNumeroTel['courriel']
              . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>Aucune</p>';
        }
      ?>
    </main>
  </body>
</html>
