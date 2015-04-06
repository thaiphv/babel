<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Person;
use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function createSimplePerson($mobileNumber, $email, $countryCode, $activationCode, $activationExpires) {
        $person = new Person();
        $person->setMobileNumber($mobileNumber);
        $person->setEmail($email);
        $person->setCountryCode($countryCode);
        $person->setActivationCode($activationCode);
        $person->setActivationCodeExpiresAt($activationExpires);

        $this->getEntityManager()->persist($person);
        $this->getEntityManager()->flush();

        return $person;
    }
}
