<?php

include_once(__DIR__ . "/../controller.php");
include_once(__DIR__ . '/../models/contacts.php');

class EditController extends Controller {
  function handle($get) {
    if (!isset($get['id'])) {
      throw new Exception('Parameter `id` is missing.');
    }
    $id = intval($get['id']);

    $model = new ContactModel($this->db);

    $contact = $model->get($id);

    $phoneNumbers = [];
    foreach ($contact['phoneNumbers'] as $phoneNumberData) {
      $phoneNumbers[$phoneNumberData['phone_number_type_code']] = $phoneNumberData['phone_number'];
    }

    $addresses = [];
    foreach ($contact['addresses'] as $addressData) {
      $addresses[$addressData['address_type_code']] = $addressData['address'];
    }

    $emailAddresses = [];
    foreach ($contact['emailAddresses'] as $emailAddressData) {
      $emailAddresses[$emailAddressData['email_type_code']] = $emailAddressData['email'];
    }    

    include(__DIR__ . '/../views/edit.php');
  }

  function handlePost($get, $post) {
    if (!isset($get['id'])) {
      throw new Exception('Parameter `id` is missing.');
    }
    $id = intval($get['id']);

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

    $model->update($id, $firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses);

    header("Location: ?action=display&id=$id");
  }
}

?>