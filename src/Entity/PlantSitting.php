<?php

namespace App\Entity;

use App\Repository\PlantSittingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantSittingRepository::class)]
class PlantSitting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'plantSittings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Plant::class, inversedBy: 'plantSittings')]
    private Collection $plant;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(type: 'datetime_immutable')]
   private $createdAt;

    #[ORM\ManyToOne(inversedBy: 'plantSittings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Botanist $botanist = null;

    public function __construct()
    {
        $this->defaultCreatedAt();
        $this->plant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Plant>
     */
    public function getPlant(): Collection
    {
        return $this->plant;
    }

    public function addPlant(Plant $plant): self
    {
        if (!$this->plant->contains($plant)) {
            $this->plant->add($plant);
        }

        return $this;
    }

    public function removePlant(Plant $plant): self
    {
        $this->plant->removeElement($plant);

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

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

    public function getBotanist(): ?Botanist
    {
        return $this->botanist;
    }

    public function setBotanist(?Botanist $botanist): self
    {
        $this->botanist = $botanist;

        return $this;
    }
}
