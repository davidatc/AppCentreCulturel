<?php

namespace App\Entity;

use App\Repository\HorairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HorairesRepository::class)
 */
class Horaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horaires;

    /**
     * @ORM\OneToMany(targetEntity=Attributions::class, mappedBy="horaires")
     */
    private $attribution;

    public function __toString()
     {
         return (String)$this->getHoraires();
     }

    public function __construct()
    {
        $this->attribution = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraires(): ?string
    {
        return $this->horaires;
    }

    public function setHoraires(string $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    /**
     * @return Collection|Attributions[]
     */
    public function getAttribution(): Collection
    {
        return $this->attribution;
    }

    public function addAttribution(Attributions $attribution): self
    {
        if (!$this->attribution->contains($attribution)) {
            $this->attribution[] = $attribution;
            $attribution->setHoraires($this);
        }

        return $this;
    }

    public function removeAttribution(Attributions $attribution): self
    {
        if ($this->attribution->contains($attribution)) {
            $this->attribution->removeElement($attribution);
            // set the owning side to null (unless already changed)
            if ($attribution->getHoraires() === $this) {
                $attribution->setHoraires(null);
            }
        }

        return $this;
    }
}
