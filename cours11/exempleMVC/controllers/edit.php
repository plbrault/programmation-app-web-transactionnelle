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

    $model->update($id, $firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses);

    header("Location: ?action=display&id=$id");
  }
}

?>