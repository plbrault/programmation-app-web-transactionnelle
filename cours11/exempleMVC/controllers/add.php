<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class AddController extends Controller {
  function handle($get) {
    include(__DIR__ . '/../views/add.php');
  }

  function handlePost($get, $post) {
    if (
      !isset($post['nom'])
      || !isset($post['prenom'])
      || !isset($post['adresseDom'])
      || !isset($post['adresseTrv'])
      || !isset($post['numeroTelDom'])
      || !isset($post['numeroTelCel'])
      || !isset($post['numeroTelTrv'])
      || !isset($post['courrielPer'])
      || !isset($post['courrielPro'])
    ) {
      throw new Exception('Some POST fields are missing.');
    }

    $lastName = trim($post['nom']);
    $firstName = trim($post['prenom']);

    $addresses = [];
    $addresses['DOM'] = trim($post['adresseDom']);
    $addresses['TRV'] = trim($post['adresseTrv']);

    $phoneNumbers = [];
    $phoneNumbers['DOM'] = trim($post['numeroTelDom']);
    $phoneNumbers['CEL'] = trim($post['numeroTelCel']);
    $phoneNumbers['TRV'] = trim($post['numeroTelTrv']);

    $emailAddresses = [];
    $emailAddresses['PER'] = trim($post['courrielPer']);
    $emailAddresses['PRO']= trim($post['courrielPro']);

    if (empty($lastName) || empty($firstName)) {
      exit;
    }

    $model = new ContactModel($this->db);

    $id = $model->insert($firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses);

    header("Location: ?action=display&id=$id");
  }
}

?>