<?php

namespace App\Tests;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('test@gmail.com')
             ->setNom('Nom Test')
             ->setPrenom('Prenom Test')
             ->setAdresse('Adresse de test')
             ->setTelephone(457855874)
             ->setNumeropermisconduire(1525852);

        $this->assertTrue($user->getEmail()=='test@gmail.com');
        $this->assertTrue($user->getNom()=='Nom Test');
        $this->assertTrue($user->getPrenom()=='Prenom Test');
        $this->assertTrue($user->getAdresse()=='Adresse de test');
        $this->assertTrue($user->getTelephone()==457855874);
        $this->assertTrue($user->getNumeropermisconduire()==1525852);
    }
}