<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $lastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $level;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message = "Valid first name is required.")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): self
    {
        $this->level = $level;

        return $this;
    }


    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function serialize()
    {
        return serialize($this->getId());
    }

    public function unserialize($data)
    {
        $this->id = unserialize($data);
    }
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
