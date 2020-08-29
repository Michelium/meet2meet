<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LanguageRepository")
 */
class Language {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $isoCode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LanguageUser", mappedBy="language", orphanRemoval=true)
     */
    private $users;

    public function __construct() {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getIsoCode(): ?string {
        return $this->isoCode;
    }

    public function setIsoCode(string $isoCode): self {
        $this->isoCode = $isoCode;

        return $this;
    }

    /**
     * @return Collection|LanguageUser[]
     */
    public function getUsers(): Collection {
        return $this->users;
    }

    public function addUser(LanguageUser $user): self {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setLanguage($this);
        }

        return $this;
    }

    public function removeUser(LanguageUser $user): self {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getLanguage() === $this) {
                $user->setLanguage(null);
            }
        }

        return $this;
    }
}
