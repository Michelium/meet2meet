<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $displayname;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $gender;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="home_users")
     */
    private $home_country;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="current_users")
     */
    private $current_country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $education;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $about;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $hobbies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $music;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $movies;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tv_shows;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LanguageUser", mappedBy="user", orphanRemoval=true)
     */
    private $languages;

    public function __construct() {
        $this->languages = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string {
        return (string)$this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisplayname() {
        return $this->displayname;
    }

    /**
     * @param mixed $displayname
     */
    public function setDisplayname($displayname): void {
        $this->displayname = $displayname;
    }

    /**
     * @return mixed
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getBirthdate() {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate): void {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender): void {
        $this->gender = $gender;
    }

    /**
     * @see UserInterface
     */
    public function getSalt() {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials() {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getHomeCountry(): ?Country {
        return $this->home_country;
    }

    public function setHomeCountry(?Country $home_country): self {
        $this->home_country = $home_country;

        return $this;
    }

    public function getCurrentCountry(): ?Country {
        return $this->current_country;
    }

    public function setCurrentCountry(?Country $current_country): self {
        $this->current_country = $current_country;

        return $this;
    }

    public function getAvatar(): ?string {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self {
        $this->avatar = $avatar;

        return $this;
    }

    public function getEducation(): ?string {
        return $this->education;
    }

    public function setEducation(?string $education): self {
        $this->education = $education;

        return $this;
    }

    public function getStatus(): ?string {
        return $this->status;
    }

    public function setStatus(?string $status): self {
        $this->status = $status;

        return $this;
    }

    public function getAbout(): ?string {
        return $this->about;
    }

    public function setAbout(?string $about): self {
        $this->about = $about;

        return $this;
    }

    public function getHobbies(): ?string {
        return $this->hobbies;
    }

    public function setHobbies(?string $hobbies): self {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function getMusic(): ?string {
        return $this->music;
    }

    public function setMusic(?string $music): self {
        $this->music = $music;

        return $this;
    }

    public function getMovies(): ?string {
        return $this->movies;
    }

    public function setMovies(?string $movies): self {
        $this->movies = $movies;

        return $this;
    }

    public function getTvShows(): ?string {
        return $this->tv_shows;
    }

    public function setTvShows(?string $tv_shows): self {
        $this->tv_shows = $tv_shows;

        return $this;
    }

    public function getBooks(): ?string {
        return $this->books;
    }

    public function setBooks(?string $books): self {
        $this->books = $books;

        return $this;
    }

    /**
     * @return Collection|LanguageUser[]
     */
    public function getLanguages(): Collection {
        return $this->languages;
    }

    public function addLanguage(LanguageUser $language): self {
        if (!$this->languages->contains($language)) {
            $this->languages[] = $language;
            $language->setUser($this);
        }

        return $this;
    }

    public function removeLanguage(LanguageUser $language): self {
        if ($this->languages->contains($language)) {
            $this->languages->removeElement($language);
            // set the owning side to null (unless already changed)
            if ($language->getUser() === $this) {
                $language->setUser(null);
            }
        }

        return $this;
    }
}
