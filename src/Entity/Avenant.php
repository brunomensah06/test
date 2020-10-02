<?php

namespace App\Entity;

use App\Repository\AvenantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvenantRepository::class)
 */
class Avenant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $MtHTVA;

    /**
     * @ORM\Column(type="integer")
     */
    private $MtTVA;

    /**
     * @ORM\Column(type="integer")
     */
    private $MtTTC;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="avenants")
     */
    private $projet_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMtHTVA(): ?int
    {
        return $this->MtHTVA;
    }

    public function setMtHTVA(int $MtHTVA): self
    {
        $this->MtHTVA = $MtHTVA;

        return $this;
    }

    public function getMtTVA(): ?int
    {
        return $this->MtTVA;
    }

    public function setMtTVA(int $MtTVA): self
    {
        $this->MtTVA = $MtTVA;

        return $this;
    }

    public function getMtTTC(): ?int
    {
        return $this->MtTTC;
    }

    public function setMtTTC(int $MtTTC): self
    {
        $this->MtTTC = $MtTTC;

        return $this;
    }

    public function getProjetId(): ?Projet
    {
        return $this->projet_id;
    }

    public function setProjetId(?Projet $projet_id): self
    {
        $this->projet_id = $projet_id;

        return $this;
    }
}
