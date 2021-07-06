<?php

use PHPUnit\Framework\TestCase;

final class CoursTest extends TestCase
{
    function testConstructorAndGetters() {
        $codeCours = '420-715-FE';
        $titreCours = "Programmation d'une application Web transactionnelle";
        $ponderationCours = [2, 3, 2];

        $cours = new Cours($codeCours, $titreCours, $ponderationCours);

        $this->assertSame($codeCours, $cours->getCode());
        $this->assertSame($titreCours, $cours->getTitre());
        $this->assertSame($ponderationCours, $cours->getPonderation());
    }

    function testConstructorThrowsErrorWhenCodeIsNotAString() {
      $codeCours = 1;
      $titreCours = "Programmation d'une application Web transactionnelle";
      $ponderationCours = [2, 3, 2];

      $this->expectExceptionMessage('Le code du cours doit être une chaîne de caractères.');

      $cours = new Cours($codeCours, $titreCours, $ponderationCours);
    }

    function testConstructorThrowsErrorWhenTitleIsNotAString() {
      $codeCours = '420-715-FE';
      $titreCours = 1;
      $ponderationCours = [2, 3, 2];

      $this->expectExceptionMessage('Le titre du cours doit être une chaîne de caractères.');

      $cours = new Cours($codeCours, $titreCours, $ponderationCours);
    }
    
    function testConstructorThrowsErrorWhenPonderationIsNotAnArray() {
      $codeCours = '420-715-FE';
      $titreCours = "Programmation d'une application Web transactionnelle";
      $ponderationCours = '2-3-2';

      $this->expectExceptionMessage('La pondération du cours doit être un tableau de 3 éléments.');

      $cours = new Cours($codeCours, $titreCours, $ponderationCours);
    }
    
    function testConstructorThrowsErrorWhenPonderationDoesNotHaveThreeElements() {
      $codeCours = '420-715-FE';
      $titreCours = "Programmation d'une application Web transactionnelle";
      $ponderationCours = [2, 3];

      $this->expectExceptionMessage('La pondération du cours doit être un tableau de 3 éléments.');

      $cours = new Cours($codeCours, $titreCours, $ponderationCours);
    }

    function testAfficher() {
      $codeCours = '420-715-FE';
      $titreCours = "Programmation d'une application Web transactionnelle";
      $ponderationCours = [2, 3, 2];

      $cours = new Cours($codeCours, $titreCours, $ponderationCours);

      $this->expectOutputString("[$codeCours] $titreCours");

      $cours->afficher();
    }
}

?>
