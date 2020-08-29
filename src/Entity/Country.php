<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $flagcode;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="home_country")
     */
    private $home_users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="current_country")
     */
    private $current_users;

    public function __construct() {
        $this->home_users = new ArrayCollection();
        $this->current_users = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCode(): ?string {
        return $this->code;
    }

    public function setCode(string $code): self {
        $this->code = $code;

        return $this;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }

    public function getFlagcode(): ?string {
        return $this->flagcode;
    }

    public function setFlagcode(?string $flagcode): self {
        $this->flagcode = $flagcode;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getHomeUsers(): Collection {
        return $this->home_users;
    }

    public function addHomeUser(User $homeUser): self {
        if (!$this->home_users->contains($homeUser)) {
            $this->home_users[] = $homeUser;
            $homeUser->setHomeCountry($this);
        }

        return $this;
    }

    public function removeHomeUser(User $homeUser): self {
        if ($this->home_users->contains($homeUser)) {
            $this->home_users->removeElement($homeUser);
            // set the owning side to null (unless already changed)
            if ($homeUser->getHomeCountry() === $this) {
                $homeUser->setHomeCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCurrentUsers(): Collection {
        return $this->current_users;
    }

    public function addCurrentUser(User $currentUser): self {
        if (!$this->current_users->contains($currentUser)) {
            $this->current_users[] = $currentUser;
            $currentUser->setCurrentCountry($this);
        }

        return $this;
    }

    public function removeCurrentUser(User $currentUser): self {
        if ($this->current_users->contains($currentUser)) {
            $this->current_users->removeElement($currentUser);
            // set the owning side to null (unless already changed)
            if ($currentUser->getCurrentCountry() === $this) {
                $currentUser->setCurrentCountry(null);
            }
        }

        return $this;
    }
}
