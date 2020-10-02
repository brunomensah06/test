<?php

namespace App\Entity;

use App\Repository\CautionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CautionRepository::class)
 */
class Caution
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
    private $Typecaution;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Donneurdecaution;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantcaution;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypecaution(): ?string
    {
        return $this->Typecaution;
    }

    public function setTypecaution(string $Typecaution): self
    {
        $this->Typecaution = $Typecaution;

        return $this;
    }

    public function getDonneurdecaution(): ?string
    {
        return $this->Donneurdecaution;
    }

    public function setDonneurdecaution(string $Donneurdecaution): self
    {
        $this->Donneurdecaution = $Donneurdecaution;

        return $this;
    }

    public function getMontantcaution(): ?int
    {
        return $this->montantcaution;
    }

    public function setMontantcaution(int $montantcaution): self
    {
        $this->montantcaution = $montantcaution;

        return $this;
    }
}
