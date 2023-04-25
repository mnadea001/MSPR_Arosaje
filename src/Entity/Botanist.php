<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BotanistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: BotanistRepository::class)]
#[ApiResource]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Botanist implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(type: 'datetime_immutable')]
    private $createdAt;

    #[ORM\OneToMany(mappedBy: 'botanist', targetEntity: Advice::class, orphanRemoval: true)]
    private Collection $advice;

    #[ORM\OneToMany(mappedBy: 'botanist', targetEntity: PlantSitting::class)]
    private Collection $plantSittings;

    public function __construct()
    {
        
        $this->defaultCreatedAt();
        $this->advice = new ArrayCollection();
        $this->plantSittings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
       /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function defaultCreatedAt()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /**
     * @return Collection<int, Advice>
     */
    public function getAdvice(): Collection
    {
        return $this->advice;
    }

    public function addAdvice(Advice $advice): self
    {
        if (!$this->advice->contains($advice)) {
            $this->advice->add($advice);
            $advice->setBotanist($this);
        }

        return $this;
    }

    public function removeAdvice(Advice $advice): self
    {
        if ($this->advice->removeElement($advice)) {
            // set the owning side to null (unless already changed)
            if ($advice->getBotanist() === $this) {
                $advice->setBotanist(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PlantSitting>
     */
    public function getPlantSittings(): Collection
    {
        return $this->plantSittings;
    }

    public function addPlantSitting(PlantSitting $plantSitting): self
    {
        if (!$this->plantSittings->contains($plantSitting)) {
            $this->plantSittings->add($plantSitting);
            $plantSitting->setBotanist($this);
        }

        return $this;
    }

    public function removePlantSitting(PlantSitting $plantSitting): self
    {
        if ($this->plantSittings->removeElement($plantSitting)) {
            // set the owning side to null (unless already changed)
            if ($plantSitting->getBotanist() === $this) {
                $plantSitting->setBotanist(null);
            }
        }

        return $this;
    }
}
