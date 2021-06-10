<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class AddController extends Controller {
  function handle($get) {
    include(__DIR__ . '/../views/add.php');
  }

  function handlePost($get, $post) {
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
      throw new Exception('Some POST fields are missing.');
    }

    $lastName = trim($_POST['nom']);
    $firstName = trim($_POST['prenom']);

    $addresses = [];
    $addresses['DOM'] = trim($_POST['adresseDom']);
    $addresses['TRV'] = trim($_POST['adresseTrv']);

    $phoneNumbers = [];
    $phoneNumbers['DOM'] = trim($_POST['numeroTelDom']);
    $phoneNumbers['CEL'] = trim($_POST['numeroTelCel']);
    $phoneNumbers['TRV'] = trim($_POST['numeroTelTrv']);

    $emailAddresses = [];
    $emailAddresses['PER'] = trim($_POST['courrielPer']);
    $emailAddresses['PRO']= trim($_POST['courrielPro']);

    if (empty($lastName) || empty($firstName)) {
      exit;
    }

    $model = new ContactModel($this->db);

    $id = $model->insert($firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses);

    header("Location: display/$id");
  }
}

?>