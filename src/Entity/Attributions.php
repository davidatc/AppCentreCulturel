<?php

namespace App\Entity;

use App\Repository\AttributionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributionsRepository::class)
 */
class Attributions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateurs::class, inversedBy="attribution")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utlisateur;

    /**
     * @ORM\OneToOne(targetEntity=Ordinateurs::class, inversedBy="attribution")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ordinateur;

    /**
     * @ORM\ManyToOne(targetEntity=Horaires::class, inversedBy="attribution")
     * @ORM\JoinColumn(nullable=false)
     */
    private $horaires;

    public function __toString()
    {
        return (String)$this->getDate();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getUtlisateur(): ?Utilisateurs
    {
        return $this->utlisateur;
    }

    public function setUtlisateur(Utilisateurs $utlisateur): self
    {
        $this->utlisateur = $utlisateur;

        return $this;
    }

    public function getOrdinateur(): ?Ordinateurs
    {
        return $this->ordinateur;
    }

    public function setOrdinateur(Ordinateurs $ordinateur): self
    {
        $this->ordinateur = $ordinateur;

        return $this;
    }

    public function getHoraires(): ?Horaires
    {
        return $this->horaires;
    }

    public function setHoraires(?Horaires $horaires): self
    {
        $this->horaires = $horaires;

        return $this;
    }

    
}
