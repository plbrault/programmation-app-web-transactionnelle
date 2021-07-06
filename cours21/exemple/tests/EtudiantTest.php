<?php

use PHPUnit\Framework\TestCase;

final class EtudiantTest extends TestCase
{
    function testConstructorAndGetters() {
        $codeEtudiant = '2020123456';
        $nomEtudiant = 'Simpson';
        $prenomEtudiant = 'Homer';

        $etudiant = new Etudiant($codeEtudiant, $nomEtudiant, $prenomEtudiant);

        $this->assertSame($codeEtudiant, $etudiant->getCode());
        $this->assertSame($nomEtudiant, $etudiant->getNom());
        $this->assertSame($prenomEtudiant, $etudiant->getPrenom());
    }

    function testAfficher() {
      $codeEtudiant = '2020123456';
      $nomEtudiant = 'Simpson';
      $prenomEtudiant = 'Homer';

      $etudiant = new Etudiant($codeEtudiant, $nomEtudiant, $prenomEtudiant);

      $this->expectOutputString("[$codeEtudiant] $nomEtudiant, $prenomEtudiant");

      $etudiant->afficher();
    }

    function testAjouterCours() {
      $cours1 = new Cours('420-705-FE', 'Programmation des interfaces Web', [2, 3, 2]);
      $cours2 = new Cours('420-7A4-FE', 'Environnement Web', [2, 2, 2]);

      $etudiant = new Etudiant('2020123456', 'Simpson', 'Homer');

      $etudiant->ajouterCours($cours1);
      $etudiant->ajouterCours($cours2);

      $this->assertSame($etudiant->getCours(), [$cours1, $cours2]);
    }

    function testAfficherCours() {
      $cours1 = new Cours('420-705-FE', 'Programmation des interfaces Web', [2, 3, 2]);
      $cours2 = new Cours('420-7A4-FE', 'Environnement Web', [2, 2, 2]);

      $etudiant = new Etudiant('2020123456', 'Simpson', 'Homer');

      $etudiant->ajouterCours($cours1);
      $etudiant->ajouterCours($cours2);

      $this->expectOutputString('<ul><li>[420-705-FE] Programmation des interfaces Web</li><li>[420-7A4-FE] Environnement Web</li></ul>');

      $etudiant->afficherCours();
    }
}

?>
