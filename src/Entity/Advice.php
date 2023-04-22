<?php

namespace App\Entity;

use App\Repository\AdviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdviceRepository::class)]
class Advice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Plant::class, inversedBy: 'advice')]
    private Collection $plant;

    #[ORM\Column(type: 'datetime_immutable')]
   private $createdAt;

    #[ORM\ManyToOne(inversedBy: 'advice')]
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
