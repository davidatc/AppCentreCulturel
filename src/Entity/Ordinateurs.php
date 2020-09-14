<?php

namespace App\Entity;

use App\Repository\OrdinateursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdinateursRepository::class)
 */
class Ordinateurs
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
    private $Identifiant;

    /**
     * @ORM\OneToOne(targetEntity=Attributions::class, mappedBy="ordinateur", cascade={"persist", "remove"})
     */
    private $attribution;

    public function __toString()
     {
         return (String)$this->getIdentifiant();
     }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifiant(): ?string
    {
        return $this->Identifiant;
    }

    public function setIdentifiant(string $Identifiant): self
    {
        $this->Identifiant = $Identifiant;

        return $this;
    }

    public function getAttribution(): ?Attributions
    {
        return $this->attribution;
    }

    public function setAttribution(Attributions $attribution): self
    {
        $this->attribution = $attribution;

        // set the owning side of the relation if necessary
        if ($attribution->getOrdinateur() !== $this) {
            $attribution->setOrdinateur($this);
        }

        return $this;
    }
}
