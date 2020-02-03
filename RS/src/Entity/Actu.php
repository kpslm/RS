<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActuRepository")
 */
class Actu
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string")
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbLike;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="actu")
     */
    private $idCommentaire;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Like", mappedBy="Actu")
     */
    private $likes;

    

    public function __construct()
    {
        $this->idCommentaire = new ArrayCollection();
        $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getNbLike(): ?int
    {
        return $this->nbLike;
    }

    public function setNbLike(int $nbLike): self
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getIdCommentaire(): Collection
    {
        return $this->idCommentaire;
    }

    public function addIdCommentaire(Commentaire $idCommentaire): self
    {
        if (!$this->idCommentaire->contains($idCommentaire)) {
            $this->idCommentaire[] = $idCommentaire;
            $idCommentaire->setActu($this);
        }

        return $this;
    }

    public function removeIdCommentaire(Commentaire $idCommentaire): self
    {
        if ($this->idCommentaire->contains($idCommentaire)) {
            $this->idCommentaire->removeElement($idCommentaire);
            // set the owning side to null (unless already changed)
            if ($idCommentaire->getActu() === $this) {
                $idCommentaire->setActu(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Like[]
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Like $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes[] = $like;
            $like->setActu($this);
        }

        return $this;
    }

    public function removeLike(Like $like): self
    {
        if ($this->likes->contains($like)) {
            $this->likes->removeElement($like);
            // set the owning side to null (unless already changed)
            if ($like->getActu() === $this) {
                $like->setActu(null);
            }
        }

        return $this;
    }

}
