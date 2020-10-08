<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $IntituleMarche;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Domaine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity=Avenant::class, mappedBy="projet_id")
     */
    private $avenants;

    public function __construct()
    {
        $this->avenants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
   
    public function getIntituleMarche(): ?string
    {
        return $this->IntituleMarche;
    }

    public function setIntituleMarche(?string $IntituleMarche): self
    {
        $this->IntituleMarche = $IntituleMarche;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->Domaine;
    }

    public function setDomaine(?string $Domaine): self
    {
        $this->Domaine = $Domaine;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->Montant;
    }

    public function setMontant(?int $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(string $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * @return Collection|Avenant[]
     */
    public function getAvenants(): Collection
    {
        return $this->avenants;
    }

    public function addAvenant(Avenant $avenant): self
    {
        if (!$this->avenants->contains($avenant)) {
            $this->avenants[] = $avenant;
            $avenant->setProjetId($this);
        }

        return $this;
    }

    public function removeAvenant(Avenant $avenant): self
    {
        if ($this->avenants->contains($avenant)) {
            $this->avenants->removeElement($avenant);
            // set the owning side to null (unless already changed)
            if ($avenant->getProjetId() === $this) {
                $avenant->setProjetId(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->IntituleMarche;
    }
    


}
