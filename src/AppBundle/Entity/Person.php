<?php
/**
 * Created by PhpStorm.
 * User: thaipham
 * Date: 5/04/15
 * Time: 3:25 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="person")
 * @ORM\HasLifecycleCallbacks()
 */
class Person {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=32, name="first_name", nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=32, name="last_name", nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=32, name="email", nullable=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=32, name="mobile_number", nullable=false, unique=true)
     */
    protected $mobileNumber;

    /**
     * @ORM\Column(type="string", length=4, name="country_code", nullable=true)
     */
    protected $countryCode;

    /**
     * @ORM\Column(type="string", length=32, name="activation_code", nullable=false)
     */
    protected $activationCode;

    /**
     * @ORM\Column(type="datetime", name="activation_code_expires_at", nullable=false)
     */
    protected $activationCodeExpiresAt;

    /**
     * @ORM\Column(type="datetime", name="created_time", nullable=false)
     */
    protected $createdTime;

    /**
     * @ORM\Column(type="datetime", name="updated_time", nullable=false)
     */
    protected $updatedTime;

    public function __construct() {
        $this->createdTime = $this->updatedTime = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedTimeLifeCycleCallback() {
        $this->updatedTime = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param mixed $mobileNumber
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
    }

    /**
     * @return mixed
     */
    public function getActivationCode()
    {
        return $this->activationCode;
    }

    /**
     * @param mixed $activationCode
     */
    public function setActivationCode($activationCode)
    {
        $this->activationCode = $activationCode;
    }

    /**
     * @return mixed
     */
    public function getActivationCodeExpiresAt()
    {
        return $this->activationCodeExpiresAt;
    }

    /**
     * @param mixed $activationCodeExpiresAt
     */
    public function setActivationCodeExpiresAt($activationCodeExpiresAt)
    {
        $this->activationCodeExpiresAt = $activationCodeExpiresAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }

    /**
     * @return mixed
     */
    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }

    /**
     * @param mixed $updatedTime
     */
    public function setUpdatedTime($updatedTime)
    {
        $this->updatedTime = $updatedTime;
    }
}