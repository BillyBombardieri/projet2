<?php

namespace App\Tests;
use App\Entity\Vehicule;
use PHPUnit\Framework\TestCase;

class VehiculeUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new Vehicule();

        $user->setType('voiture')
             ->setMarque('marque Test')
             ->setModele('modele Test')
             ->setNumeroserie(123456)
             ->setPlaqueImmatriculation(457855874)
             ->setNbKilometre(1525852);

        $this->assertTrue($user->getType()=='voiture');
        $this->assertTrue($user->getMarque()=='marque Test');
        $this->assertTrue($user->getModele()=='modele Test');
        $this->assertTrue($user->getNumeroserie()==123456);
        $this->assertTrue($user->getPlaqueImmatriculation()==457855874);
        $this->assertTrue($user->getNbKilometre()==1525852);
    }
}