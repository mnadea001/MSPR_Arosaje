<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VisitorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: VisitorRepository::class)]
class Visitor extends User
{

    #[ORM\OneToMany(mappedBy: 'Visitor', targetEntity: Plant::class)]
    private Collection $plants;

    #[ORM\OneToMany(mappedBy: 'Visitor', targetEntity: PlantSitting::class)]
    private Collection $plantSittings;

    public function __construct()
    {
        parent::__construct();
        $this->plants = new ArrayCollection();
        $this->plantSittings = new ArrayCollection();
    }


    /**
     * @return Collection<int, Plant>
     */
    public function getPlants(): Collection
    {
        return $this->plants;
    }

    public function addPlant(Plant $plant): self
    {
        if (!$this->plants->contains($plant)) {
            $this->plants->add($plant);
            $plant->setVisitor($this);
        }

        return $this;
    }

    public function removePlant(Plant $plant): self
    {
        if ($this->plants->removeElement($plant)) {
            // set the owning side to null (unless already changed)
            if ($plant->getVisitor() === $this) {
                $plant->setVisitor(null);
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
            $plantSitting->setVisitor($this);
        }

        return $this;
    }

    public function removePlantSitting(PlantSitting $plantSitting): self
    {
        if ($this->plantSittings->removeElement($plantSitting)) {
            // set the owning side to null (unless already changed)
            if ($plantSitting->getVisitor() === $this) {
                $plantSitting->setVisitor(null);
            }
        }

        return $this;
    }
}
