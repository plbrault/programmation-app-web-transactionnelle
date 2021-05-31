<?php
  include_once('connexionBD.php');

  if (!isset($_GET['id'])) {
    echo 'Paramètre <strong>id</strong> manquant.';
    exit;
  }
  $idContact = intval($_GET['id']);

  /*
    On utilise une transaction pour s'assurer que
    1) les opérations modifiant la BD n'aient effet que si toutes les requêtes réussissent;
    2) Il n'y ait pas de modification entre temps sur les données lues puis mises à jour.
  */
  $bdd->beginTransaction();

  // Récupérer le nom et prénom

  $requete = $bdd->prepare('SELECT nom, prenom FROM contacts WHERE id = ?');
  $requete->execute([ $idContact ]);
  
  $contact = $requete->fetch();

  $requete->closeCursor();

  // Récupérer les adresses

  $requete = $bdd->prepare("SELECT adresse, type_adresse FROM adresses WHERE contact_id = ?");
  $requete->execute([ $idContact ]);
  
  $adresses = [];
  while ($donneesAdresse = $requete->fetch()) {
    $adresses[$donneesAdresse['type_adresse']] = $donneesAdresse['adresse'];
  }

  $requete->closeCursor();

  // Récupérer les numéros de téléphone

  $requete = $bdd->prepare("SELECT numero_tel, type_numero_tel FROM numeros_tel WHERE contact_id = ?");
  $requete->execute([ $idContact ]);
  
  $numerosTel = [];
  while ($donneesNumeroTel = $requete->fetch()) {
    $numerosTel[$donneesNumeroTel['type_numero_tel']] = $donneesNumeroTel['numero_tel'];
  }

  $requete->closeCursor();

  // Récupérer les adresses courriel

  $requete = $bdd->prepare("SELECT courriel, type_courriel FROM courriels WHERE contact_id = ?");
  $requete->execute([ $idContact ]);
  
  $courriels = [];
  while ($donneesCourriel = $requete->fetch()) {
    $courriels[$donneesCourriel['type_courriel']] = $donneesCourriel['courriel'];
  }

  $requete->closeCursor();

  /*
    On place le code de traitement des données du formulaire avant tout code HTML,
    pour la raison indiquée plus bas.
  */

  if (isset($_POST['submit'])) {
    if (
      !isset($_POST['nom'])
      || !isset($_POST['prenom'])
      || !isset($_POST['adresseDom'])
      || !isset($_POST['adresseTrv'])
      || !isset($_POST['numeroTelDom'])
      || !isset($_POST['numeroTelCel'])
      || !isset($_POST['numeroTelTrv'])
      || !isset($_POST['courrielPer'])
      || !isset($_POST['courrielPro'])
    ) {
      exit;
    }
    if (empty($_POST['nom']) || empty($_POST['prenom'])) {
      exit;
    }

    $nomForm = $_POST['nom'];
    $prenomForm = $_POST['prenom'];

    $adressesForm = [];
    $adressesForm['DOM'] = $_POST['adresseDom'];
    $adressesForm['TRV'] = $_POST['adresseTrv'];

    $numerosTelForm = [];
    $numerosTelForm['DOM'] = $_POST['numeroTelDom'];
    $numerosTelForm['CEL'] = $_POST['numeroTelCel'];
    $numerosTelForm['TRV'] = $_POST['numeroTelTrv'];

    $courrielsForm = [];
    $courrielsForm['PER'] = $_POST['courrielPer'];
    $courrielsForm['PRO']= $_POST['courrielPro'];

    // Mise à jour nom et prénom
    if ($contact['nom'] !== $_POST['nom'] || $contact['prenom'] !== $_POST['prenom']) {
      $requete = $bdd->prepare('UPDATE contacts SET nom = ?, prenom = ? WHERE id = ?');
      $requete->execute([ $_POST['nom'], $_POST['prenom'], $idContact ]);
    }

    // Mise à jour des adresses
    $reponse = $bdd->query('SELECT code FROM types_adresse');
    while ($donneesTypeAdresse = $reponse->fetch()) {
      $typeAdresse = $donneesTypeAdresse['code'];

      // Si un champ de coordonnée a été vidé, supprimer la donnée.
      if (isset($adresses[$typeAdresse]) && empty($adressesForm[$typeAdresse])) {
        $requete = $bdd->prepare("DELETE FROM adresses WHERE contact_id = ? AND type_adresse = '$typeAdresse'");
        $requete->execute([ $idContact ]);
      }
      // Si une coordonnée a été ajoutée, insérer la donnée.
      else if (!isset($adresses[$typeAdresse]) && !empty($adressesForm[$typeAdresse])) {
        $requete = $bdd->prepare("INSERT INTO adresses (contact_id, type_adresse, adresse) VALUES (?, '$typeAdresse', ?)");
        $requete->execute([ $idContact, $adressesForm[$typeAdresse] ]);
      }
      // Si une coordonnée a été modifiée, mettre à jour la donnée.
      else if ($adresses[$typeAdresse] !== $adressesForm[$typeAdresse]) {
        $requete = $bdd->prepare("UPDATE adresses SET adresse = ? WHERE contact_id = ? AND type_adresse = '$typeAdresse'");
        $requete->execute([ $adressesForm[$typeAdresse], $idContact ]);
      }
    }
    $reponse->closeCursor();
    
    // Mises à jour des numéros de téléphone
    $reponse = $bdd->query('SELECT code FROM types_numero_tel');
    while ($donneesTypeNumeroTel = $reponse->fetch()) {
      $typeNumeroTel = $donneesTypeNumeroTel['code'];

      // Si un champ de coordonnée a été vidé, supprimer la donnée.
      if (isset($numerosTel[$typeNumeroTel]) && empty($numerosTelForm[$typeNumeroTel])) {
        $requete = $bdd->prepare("DELETE FROM numeros_tel WHERE contact_id = ? AND type_numero_tel = '$typeNumeroTel'");
        $requete->execute([ $idContact ]);
      }
      // Si une coordonnée a été ajoutée, insérer la donnée.
      else if (!isset($numerosTel[$typeNumeroTel]) && !empty($numerosTelForm[$typeNumeroTel])) {
        $requete = $bdd->prepare("INSERT INTO numeros_tel (contact_id, type_numero_tel, numero_tel) VALUES (?, '$typeNumeroTel', ?)");
        $requete->execute([ $idContact, $numerosTelForm[$typeNumeroTel] ]);
      }
      // Si une coordonnée a été modifiée, mettre à jour la donnée.
      else if ($numerosTel[$typeNumeroTel] !== $numerosTelForm[$typeNumeroTel]) {
        $requete = $bdd->prepare("UPDATE numeros_tel SET numero_tel = ? WHERE contact_id = ? AND type_numero_tel = '$typeNumeroTel'");
        $requete->execute([ $numerosTelForm[$typeNumeroTel], $idContact ]);
      }
    }
    $reponse->closeCursor();

    // Mises à jour des adresses courriel
    $reponse = $bdd->query('SELECT code FROM types_courriel');
    while ($donneesTypeCourriel = $reponse->fetch()) {
      $typeCourriel = $donneesTypeCourriel['code'];

      // Si un champ de coordonnée a été vidé, supprimer la donnée.
      if (isset($courriels[$typeCourriel]) && empty($courrielsForm[$typeCourriel])) {
        $requete = $bdd->prepare("DELETE FROM courriels WHERE contact_id = ? AND type_courriel = '$typeCourriel'");
        $requete->execute([ $idContact ]);
      }
      // Si une coordonnée a été ajoutée, insérer la donnée.
      else if (!isset($courriels[$typeCourriel]) && !empty($courrielsForm[$typeCourriel])) {
        $requete = $bdd->prepare("INSERT INTO courriels (contact_id, type_courriel, courriel) VALUES (?, '$typeCourriel', ?)");
        $requete->execute([ $idContact, $courrielsForm[$typeCourriel] ]);
      }
      // Si une coordonnée a été modifiée, mettre à jour la donnée.
      else if (isset($courriels[$typeCourriel]) && $courriels[$typeCourriel] !== $courrielsForm[$typeCourriel]) {
        $requete = $bdd->prepare("UPDATE courriels SET courriel = ? WHERE contact_id = ? AND type_courriel = '$typeCourriel'");
        $requete->execute([ $courrielsForm[$typeCourriel], $idContact ]);
      }
    }
    $reponse->closeCursor();
    
    $bdd->commit(); // Fermer la transaction

    /*
      Redirection vers l'affichage du contact nouvellement créé
      L'utilisation de la fonction `header` exige de la placer avant l'envoi de tout contenu au navigateur,
      incluant par des lignes de code HTML.
      Voir la documentation pour plus d'informations: https://www.php.net/manual/fr/function.header.php
    */
    header("Location: /cours10/exemple/afficher.php?id=$idContact");

  } else {
    $bdd->commit(); // Fermer la transaction

    ?>
      <!DOCTYPE html>
      <html>
        <head>
          <title>
            <?= 'Modifier « ' . $contact['nom']  . ', ' . $contact['prenom'] . ' »' ?>
          </title>
          <link rel="stylesheet" href="/cours10/exemple/style.css"> 
        </head>
        <body>
        <p>
          <a href="/cours10/exemple/">Contacts</a>
            &nbsp;/&nbsp;
            <?= $contact['nom'] . ', ' . $contact['prenom'] ?>
          </p>
          <h1><?= 'Modifier « ' . $contact['nom']  . ', ' . $contact['prenom'] . ' »' ?></h1>
          <main>
            <form action="modifier.php?id=<?= $idContact ?>" method="POST">
              <p>
                <label for="nom_input">Nom:</label>
                <input type="text" id="nom_input" name="nom" value="<?= $contact['nom'] ?>" required />
              </p>
              <p>
                <label for="nom_input">Prénom:</label>
                <input type="text" id="prenom_input" name="prenom" value="<?= $contact['prenom'] ?>" required />
              </p>

              <h2>Numéros de téléphone</h2>
              <p>
                <label for="numero_tel_dom_input">Domicile:</label>
                <input type="text" id="numero_tel_dom_input" name="numeroTelDom" value="<?= isset($numerosTel['DOM']) ? $numerosTel['DOM'] : '' ?>" />
              </p>
              <p>
                <label for="numero_tel_cel_input">Cellulaire:</label>
                <input type="text" id="numero_tel_cel_input" name="numeroTelCel" value="<?= isset($numerosTel['CEL']) ? $numerosTel['CEL'] : '' ?>" />              
              </p>                          
              <p>
                <label for="numero_tel_trv_input">Travail:</label>
                <input type="text" id="numero_tel_trv_input" name="numeroTelTrv" value="<?= isset($numerosTel['TRV']) ? $numerosTel['TRV'] : '' ?>" />              
              </p>

              <h2>Adresses</h2>
              <?php
              ?>
              <p>
                <label for="adresse_dom_input">Domicile:</label>
                <input type="text" id="adresse_dom_input" name="adresseDom" value="<?= isset($adresses['DOM']) ? $adresses['DOM'] : '' ?>" />
              </p>              
              <p>
                <label for="adresse_trv_input">Travail:</label>
                <input type="text" id="adresse_trv_input" name="adresseTrv" value="<?= isset($adresses['TRV']) ? $adresses['TRV'] : '' ?>" />              
              </p>

              <h2>Adresses courriel</h2>
              <p>
                <label for="courriel_per_input">Personnelle:</label>
                <input type="text" id="courriel_per_input" name="courrielPer" value="<?= isset($courriels['PER']) ? $courriels['PER'] : '' ?>" />
              </p>
              <p>
                <label for="courriel_pro_input">Professionnelle:</label>
                <input type="text" id="courriel_pro_input" name="courrielPro" value="<?= isset($courriels['PRO']) ? $courriels['PRO'] : '' ?>" />
              </p>
              
              <input type="submit" name="submit" value="Soumettre" />
            </form>
            <p>
              <a href="/cours10/exemple/afficher.php?id=<?= $idContact ?>">Annuler</a>
            </p>
          </main>
        </body>
      </html>
    <?php
  }
?>
