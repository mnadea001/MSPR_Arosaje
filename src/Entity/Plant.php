<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[ApiResource]

class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageFile = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    private ?Visitor $Visitor = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $addAt = null;

    #[ORM\OneToMany(mappedBy: 'plant', targetEntity: Advice::class, orphanRemoval: true)]
    private Collection $Advice;

    #[ORM\ManyToMany(targetEntity: PlantSitting::class, mappedBy: 'plant')]
    private Collection $plantSittings;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'plants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PlantType $PlantType = null;

    public function __construct()
    {
        $this->Advice = new ArrayCollection();
        $this->plantSittings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    public function setImageFile(?string $imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getVisitor(): ?Visitor
    {
        return $this->Visitor;
    }

    public function setVisitor(?Visitor $Visitor): self
    {
        $this->Visitor = $Visitor;

        return $this;
    }

    public function getAddAt(): ?\DateTimeImmutable
    {
        return $this->addAt;
    }

    public function setAddAt(\DateTimeImmutable $addAt): self
    {
        $this->addAt = $addAt;

        return $this;
    }

    /**
     * @return Collection<int, Advice>
     */
    public function getAdvice(): Collection
    {
        return $this->Advice;
    }

    public function addAdvice(Advice $advice): self
    {
        if (!$this->Advice->contains($advice)) {
            $this->Advice->add($advice);
            $advice->setPlant($this);
        }

        return $this;
    }

    public function removeAdvice(Advice $advice): self
    {
        if ($this->Advice->removeElement($advice)) {
            // set the owning side to null (unless already changed)
            if ($advice->getPlant() === $this) {
                $advice->setPlant(null);
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
            $plantSitting->addPlant($this);
        }

        return $this;
    }

    public function removePlantSitting(PlantSitting $plantSitting): self
    {
        if ($this->plantSittings->removeElement($plantSitting)) {
            $plantSitting->removePlant($this);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPlantType(): ?PlantType
    {
        return $this->PlantType;
    }

    public function setPlantType(?PlantType $PlantType): self
    {
        $this->PlantType = $PlantType;

        return $this;
    }
}
