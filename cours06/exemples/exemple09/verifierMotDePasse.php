<?php
  function verifierMotDePasse($nomUtilisateur, $motDePasse) {
    $motsDePasseUtilisateurs = array(
      'bob' => 'bobEstCool',
      'alice' => 'aliceEstCool',
      'roger' => 'rogerEstCool'
    );

    return $motsDePasseUtilisateurs[$nomUtilisateur] === $motDePasse;
  }
?>