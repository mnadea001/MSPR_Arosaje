<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\BotanisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BotanisteRepository::class)]
#[ApiResource]
class Botaniste extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'Botaniste', targetEntity: Advice::class, orphanRemoval: true)]
    private Collection $advice;

    #[ORM\OneToMany(mappedBy: 'Botaniste', targetEntity: PlantSitting::class, orphanRemoval: true)]
    private Collection $plantSittings;

    public function __construct()
    {
        parent::__construct();
        $this->advice = new ArrayCollection();
        $this->plantSittings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $advice->setBotaniste($this);
        }

        return $this;
    }

    public function removeAdvice(Advice $advice): self
    {
        if ($this->advice->removeElement($advice)) {
            // set the owning side to null (unless already changed)
            if ($advice->getBotaniste() === $this) {
                $advice->setBotaniste(null);
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
            $plantSitting->setBotaniste($this);
        }

        return $this;
    }

    public function removePlantSitting(PlantSitting $plantSitting): self
    {
        if ($this->plantSittings->removeElement($plantSitting)) {
            // set the owning side to null (unless already changed)
            if ($plantSitting->getBotaniste() === $this) {
                $plantSitting->setBotaniste(null);
            }
        }

        return $this;
    }



}
