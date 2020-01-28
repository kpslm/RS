<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AboRepository")
 */
class Abo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="abos")
     */
    private $idUser;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="abos")
     */
    private $IdUserAbo;

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
        $this->IdUserAbo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUser(): Collection
    {
        return $this->idUser;
    }

    public function addIdUser(User $idUser): self
    {
        if (!$this->idUser->contains($idUser)) {
            $this->idUser[] = $idUser;
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->contains($idUser)) {
            $this->idUser->removeElement($idUser);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getIdUserAbo(): Collection
    {
        return $this->IdUserAbo;
    }

    public function addIdUserAbo(User $idUserAbo): self
    {
        if (!$this->IdUserAbo->contains($idUserAbo)) {
            $this->IdUserAbo[] = $idUserAbo;
        }

        return $this;
    }

    public function removeIdUserAbo(User $idUserAbo): self
    {
        if ($this->IdUserAbo->contains($idUserAbo)) {
            $this->IdUserAbo->removeElement($idUserAbo);
        }

        return $this;
    }
}
