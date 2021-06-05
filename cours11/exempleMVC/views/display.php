<!DOCTYPE html>
<html>
  <head>
    <title>
      <?= $contact['last_name'] ?>, <?= $contact['first_name'] ?>
    </title>
    <link rel="stylesheet" href="/cours11/exempleMVC/public/style.css"> 
  </head>
  <body>
    <p>
      <a href="?action=list">Contacts</a>
      &nbsp;/&nbsp;
      <?= $contact['last_name'] . ', ' . $contact['first_name'] ?>
    </p>
    <h1><?= $contact['last_name'] . ', ' . $contact['first_name'] ?></h1>   
    
    <p>
      <a href="?action=edit&id=<?= $contact['id'] ?>">
        ✏️
      </a>
      &nbsp;
      <a
        onclick="return confirm('Voulez-vous vraiment supprimer le contact « <?= $contact['last_name'] . ', ' . $contact['first_name'] ?> » ?')"
        href="?action=delete&id=<?= $contact['id'] ?>"
      >
        ❌
      </a>
    </p>

    <main>
      <h2>Numéros de téléphone</h2>
      <?php
        if (!empty($contact['phoneNumbers'])) {
          echo '<ul>';
          foreach ($contact['phoneNumbers'] as $phoneNumberData) {
            echo '<li><strong>'
              . $phoneNumberData['phone_number_type']
              . ': </strong>'
              . $phoneNumberData['phone_number']
              . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>Aucun</p>';
        }
      ?>

      <h2>Adresses</h2>
      <?php
        if (!empty($contact['addresses'])) {
          echo '<ul>';
          foreach ($contact['addresses'] as $addressData) {
            echo '<li><strong>'
              . $addressData['address_type']
              . ': </strong>'
              . $addressData['address']
              . '</li>';
          }
          echo '</ul>';
        } else {
          echo '<p>Aucun</p>';
        }
      ?>

      <h2>Adresses courriel</h2>
      <?php
        if (!empty($contact['emailAddresses'])) {
          echo '<ul>';
          foreach ($contact['emailAddresses'] as $emailAddressData) {
            echo '<li><strong>'
              . $emailAddressData['email_type']
              . ': </strong>'
              . $emailAddressData['email']
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
