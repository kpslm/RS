<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbLike;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commentaires")
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Publication", inversedBy="commentaires")
     */
    private $idPublication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Picture", inversedBy="commentaires")
     */
    private $idPicture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Actu", inversedBy="idCommentaire")
     */
    private $actu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Like", inversedBy="idCom")
     */
    private $likes;


  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
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

    public function getNbLike(): ?int
    {
        return $this->nbLike;
    }

    public function setNbLike(int $nbLike): self
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdPublication(): ?Publication
    {
        return $this->idPublication;
    }

    public function setIdPublication(?Publication $idPublication): self
    {
        $this->idPublication = $idPublication;

        return $this;
    }

    public function getIdPicture(): ?Picture
    {
        return $this->idPicture;
    }

    public function setIdPicture(?Picture $idPicture): self
    {
        $this->idPicture = $idPicture;

        return $this;
    }

    public function getActu(): ?Actu
    {
        return $this->actu;
    }

    public function setActu(?Actu $actu): self
    {
        $this->actu = $actu;

        return $this;
    }

    public function getLikes(): ?Like
    {
        return $this->likes;
    }

    public function setLikes(?Like $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

    

    
}
