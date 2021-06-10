<?php

class ContactModel {
  private $db;

  function __construct($db) {
    $this->db = $db;
  }

  function getAll() {
    $query = $this->db->query('SELECT id, prenom AS first_name, nom AS last_name FROM contacts ORDER BY last_name, first_name');
    return $query->fetchAll();
  }

  function get($id) {
    $contactQuery = $this->db->prepare('SELECT id, prenom AS first_name, nom AS last_name FROM  contacts WHERE id = ?');
    $contactQuery->execute([ $id ]);
    $contact = $contactQuery->fetch();

    if ($contact) {
      $phoneQuery = $this->db->prepare('
        SELECT numero_tel AS phone_number, types_numero_tel.description AS phone_number_type, type_numero_tel AS phone_number_type_code
          FROM numeros_tel
          JOIN types_numero_tel
            ON types_numero_tel.code = numeros_tel.type_numero_tel
          WHERE contact_id = ?
      ');
      $phoneQuery->execute([$id]);

      $addressQuery = $this->db->prepare('
        SELECT adresse AS address, types_adresse.description AS address_type, type_adresse AS address_type_code
          FROM adresses JOIN types_adresse
            ON types_adresse.code = adresses.type_adresse
          WHERE contact_id = ?'
      );
      $addressQuery->execute(array($id));

      $emailQuery = $this->db->prepare('
        SELECT courriel AS email, types_courriel.description AS email_type, type_courriel AS email_type_code
          FROM courriels
          JOIN types_courriel
            ON types_courriel.code = courriels.type_courriel
          WHERE contact_id = ?
      ');
      $emailQuery->execute(array($id));

      $result = array_merge(
        $contact,
        ['phone_numbers' => $phoneQuery->fetchAll()],
        ['addresses' => $addressQuery->fetchAll()],
        ['email_addresses' => $emailQuery->fetchAll()],
      );

      return $result;
    }
    return null;
  }

  function insert($firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses) {
    try {
      $this->db->beginTransaction();
    
      $query = $this->db->prepare('INSERT INTO contacts (prenom, nom) VALUES (?, ?) RETURNING id');
      $query->execute([$firstName, $lastName]);
      $contactID = $query->fetchColumn(); // Retourne la valeur du champ dans le cas où une requête retourne un seul champ

      foreach ($phoneNumbers as $phoneNumberTypeCode => $phoneNumber) {
        $query = $this->db->prepare("INSERT INTO numeros_tel(contact_id, type_numero_tel, numero_tel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $phoneNumberTypeCode, $phoneNumber ]);
      }

      foreach ($addresses as $addressTypeCode => $address) {
        $query = $this->db->prepare("INSERT INTO numeros_tel(contact_id, type_numero_tel, numero_tel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $addressTypeCode, $address ]);
      }

      foreach ($emailAddresses as $emailAddressTypeCode => $emailAddress) {
        $query = $this->db->prepare("INSERT INTO courriels(contact_id, type_courriel, courriel) VALUES(?, ?, ?)");
        $query->execute([ $contactID, $emailAddressTypeCode, $emailAddress ]);
      }

      $this->db->commit();

      return $contactID;
    } catch (Exception $e) {
      $this->db->rollback();
      throw $e;
    }
  }

  function update($id, $firstName, $lastName, $phoneNumbers, $addresses, $emailAddresses) {
    try {
      $this->db->beginTransaction();

      $currentData = $this->get($id);

      $currentPhoneNumbers = [];
      foreach ($currentData['phone_numbers'] as $phoneNumberData) {
        $currentPhoneNumbers[$phoneNumberData['phone_number_type_code']] = $phoneNumberData['phone_number'];
      }
  
      $currentAddresses = [];
      foreach ($currentData['addresses'] as $addressData) {
        $currentAddresses[$addressData['address_type_code']] = $addressData['address'];
      }
  
      $currentEmailAddresses = [];
      foreach ($currentData['email_addresses'] as $emailAddressData) {
        $currentEmailAddresses[$emailAddressData['email_type_code']] = $emailAddressData['email'];
      }    

      if ($currentData['first_name'] !== $firstName || $currentData['last_name'] !== $lastName) {
        $query = $this->db->prepare('UPDATE contacts SET prenom = ?, nom = ? WHERE id = ?');
        $query->execute([ $firstName, $lastName, $id ]);
      }

      $response = $this->db->query('SELECT code FROM types_adresse');
      foreach ($response as $addressTypeData) {
        $addressTypeCode = $addressTypeData['code'];
  
        // Si un champ de coordonnée a été vidé, supprimer la donnée.
        if (!isset($addresses[$addressTypeCode]) && !empty($currentAddresses[$addressTypeCode])) {
          $query = $this->db->prepare("DELETE FROM adresses WHERE contact_id = ? AND type_adresse = '$addressTypeCode'");
          $query->execute([ $id ]);
        }
        // Si une coordonnée a été ajoutée, insérer la donnée.
        else if (isset($addresses[$addressTypeCode]) && empty($currentAddresses[$addressTypeCode])) {
          $query = $this->db->prepare("INSERT INTO adresses (contact_id, type_adresse, adresse) VALUES (?, '$addressTypeCode', ?)");
          $query->execute([ $id, $addresses[$addressTypeCode] ]);
        }
        // Si une coordonnée a été modifiée, mettre à jour la donnée.
        else if (isset($addresses[$addressTypeCode]) && $addresses[$addressTypeCode] !== $currentAddresses[$addressTypeCode]) {
          $query = $this->db->prepare("UPDATE adresses SET adresse = ? WHERE contact_id = ? AND type_adresse = '$addressTypeCode'");
          $query->execute([ $addresses[$addressTypeCode], $id ]);
        }
      }

      $response = $this->db->query('SELECT code FROM types_numero_tel');
      foreach ($response as $phoneNumberTypeData) {
        $phoneNumberTypeCode = $phoneNumberTypeData['code'];
  
        // Si un champ de coordonnée a été vidé, supprimer la donnée.
        if (!isset($phoneNumbers[$phoneNumberTypeCode]) && !empty($currentPhoneNumbers[$phoneNumberTypeCode])) {
          $query = $this->db->prepare("DELETE FROM numeros_tel WHERE contact_id = ? AND type_numero_tel = '$phoneNumberTypeCode'");
          $query->execute([ $id ]);
        }
        // Si une coordonnée a été ajoutée, insérer la donnée.
        else if (isset($phoneNumbers[$phoneNumberTypeCode]) && empty($currentPhoneNumbers[$phoneNumberTypeCode])) {
          $query = $this->db->prepare("INSERT INTO numeros_tel (contact_id, type_numero_tel, numero_tel) VALUES (?, '$phoneNumberTypeCode', ?)");
          $query->execute([ $id, $phoneNumbers[$phoneNumberTypeCode] ]);
        }
        // Si une coordonnée a été modifiée, mettre à jour la donnée.
        else if (isset($phoneNumbers[$phoneNumberTypeCode]) && $phoneNumbers[$phoneNumberTypeCode] !== $currentPhoneNumbers[$phoneNumberTypeCode]) {
          $query = $this->db->prepare("UPDATE numeros_tel SET numero_tel = ? WHERE contact_id = ? AND type_numero_tel = '$phoneNumberTypeCode'");
          $query->execute([ $phoneNumbers[$phoneNumberTypeCode], $id ]);
        }
      }
      
      $response = $this->db->query('SELECT code FROM types_courriel');
      foreach ($response as $emailAddressTypeData) {
        $emailAddressTypeCode = $emailAddressTypeData['code'];
  
        // Si un champ de coordonnée a été vidé, supprimer la donnée.
        if (!isset($emailAddresses[$emailAddressTypeCode]) && !empty($currentEmailAddresses[$emailAddressTypeCode])) {
          $query = $this->db->prepare("DELETE FROM courriels WHERE contact_id = ? AND type_courriel = '$emailAddressTypeCode'");
          $query->execute([ $id ]);
        }
        // Si une coordonnée a été ajoutée, insérer la donnée.
        else if (isset($emailAddresses[$emailAddressTypeCode]) && empty($currentEmailAddresses[$emailAddressTypeCode])) {
          $query = $this->db->prepare("INSERT INTO courriels (contact_id, type_courriel, courriel) VALUES (?, '$emailAddressTypeCode', ?)");
          $query->execute([ $id, $emailAddresses[$emailAddressTypeCode] ]);
        }
        // Si une coordonnée a été modifiée, mettre à jour la donnée.
        else if (isset($emailAddresses[$emailAddressTypeCode]) && $emailAddresses[$emailAddressTypeCode] !== $currentEmailAddresses[$emailAddressTypeCode]) {
          $query = $this->db->prepare("UPDATE courriels SET courriel = ? WHERE contact_id = ? AND type_courriel = '$emailAddressTypeCode'");
          $query->execute([ $emailAddresses[$emailAddressTypeCode], $id ]);
        }
      }     

      $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollback();
      throw $e;    }
  }

  function delete($id) {
    $query = $this->db->prepare('DELETE FROM contacts WHERE id = ?');
    $query->execute([ $id ]);
  }
}

?>