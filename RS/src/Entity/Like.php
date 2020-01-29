<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LikeRepository")
 */
class Like
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="likes", nullable=true)
     */
    private $idUser;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="likes", nullable=true)
     */
    private $idCom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Publication", mappedBy="likes", nullable=true)
     */
    private $idPublication;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="likes", nullable=true)
     */
    private $idPhoto;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Actu", mappedBy="likes", nullable=true)
     */
    private $idActu;

    public function __construct()
    {
        $this->idUser = new ArrayCollection();
        $this->idCom = new ArrayCollection();
        $this->idPublication = new ArrayCollection();
        $this->idPhoto = new ArrayCollection();
        $this->idActu = new ArrayCollection();
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
            $idUser->setLikes($this);
        }

        return $this;
    }

    public function removeIdUser(User $idUser): self
    {
        if ($this->idUser->contains($idUser)) {
            $this->idUser->removeElement($idUser);
            // set the owning side to null (unless already changed)
            if ($idUser->getLikes() === $this) {
                $idUser->setLikes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getIdCom(): Collection
    {
        return $this->idCom;
    }

    public function addIdCom(Commentaire $idCom): self
    {
        if (!$this->idCom->contains($idCom)) {
            $this->idCom[] = $idCom;
            $idCom->setLikes($this);
        }

        return $this;
    }

    public function removeIdCom(Commentaire $idCom): self
    {
        if ($this->idCom->contains($idCom)) {
            $this->idCom->removeElement($idCom);
            // set the owning side to null (unless already changed)
            if ($idCom->getLikes() === $this) {
                $idCom->setLikes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getIdPublication(): Collection
    {
        return $this->idPublication;
    }

    public function addIdPublication(Publication $idPublication): self
    {
        if (!$this->idPublication->contains($idPublication)) {
            $this->idPublication[] = $idPublication;
            $idPublication->setLikes($this);
        }

        return $this;
    }

    public function removeIdPublication(Publication $idPublication): self
    {
        if ($this->idPublication->contains($idPublication)) {
            $this->idPublication->removeElement($idPublication);
            // set the owning side to null (unless already changed)
            if ($idPublication->getLikes() === $this) {
                $idPublication->setLikes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getIdPhoto(): Collection
    {
        return $this->idPhoto;
    }

    public function addIdPhoto(Picture $idPhoto): self
    {
        if (!$this->idPhoto->contains($idPhoto)) {
            $this->idPhoto[] = $idPhoto;
            $idPhoto->setLikes($this);
        }

        return $this;
    }

    public function removeIdPhoto(Picture $idPhoto): self
    {
        if ($this->idPhoto->contains($idPhoto)) {
            $this->idPhoto->removeElement($idPhoto);
            // set the owning side to null (unless already changed)
            if ($idPhoto->getLikes() === $this) {
                $idPhoto->setLikes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Actu[]
     */
    public function getIdActu(): Collection
    {
        return $this->idActu;
    }

    public function addIdActu(Actu $idActu): self
    {
        if (!$this->idActu->contains($idActu)) {
            $this->idActu[] = $idActu;
            $idActu->setLikes($this);
        }

        return $this;
    }

    public function removeIdActu(Actu $idActu): self
    {
        if ($this->idActu->contains($idActu)) {
            $this->idActu->removeElement($idActu);
            // set the owning side to null (unless already changed)
            if ($idActu->getLikes() === $this) {
                $idActu->setLikes(null);
            }
        }

        return $this;
    }
}
