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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="likes")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actu", inversedBy="likes")
     */
    private $Actu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaire", inversedBy="likes")
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publication", inversedBy="likes")
     */
    private $publication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Picture", inversedBy="likes")
     */
    private $picture;

    public function __construct()
    {
       
        $this->idCom = new ArrayCollection();
        $this->idPublication = new ArrayCollection();
        $this->idPhoto = new ArrayCollection();
        $this->idActu = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getActu(): ?Actu
    {
        return $this->Actu;
    }

    public function setActu(?Actu $Actu): self
    {
        $this->Actu = $Actu;

        return $this;
    }

    public function getCommentaire(): ?Commentaire
    {
        return $this->commentaire;
    }

    public function setCommentaire(?Commentaire $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getPicture(): ?Picture
    {
        return $this->picture;
    }

    public function setPicture(?Picture $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
