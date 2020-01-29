<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="date")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $cdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $background;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="date")
     */
    private $atCreated;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActivate;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $compteEntreprise;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Publication", mappedBy="idUser")
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="idUser")
     */
    private $pictures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="idUser")
     */
    private $messages;

    // /**
    //  * @ORM\ManyToMany(targetEntity="App\Entity\Abo", mappedBy="idUser")
    //  */
    // private $abos;

    // /**
    //  * @ORM\ManyToMany(targetEntity="App\Entity\Abo", mappedBy="idUserAbo")
    //  */
    // private $abonnée;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="idUser")
     */
    private $commentaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Like", inversedBy="idUser")
     */
    private $likes;

 

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->abos = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getAge(): ?\DateTimeInterface
    {
        return $this->age;
    }

    public function setAge(?\DateTimeInterface $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCdp(): ?string
    {
        return $this->cdp;
    }

    public function setCdp(string $cdp): self
    {
        $this->cdp = $cdp;

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

    public function getBackground(): ?string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getAtCreated(): ?\DateTimeInterface
    {
        return $this->atCreated;
    }

    public function setAtCreated(\DateTimeInterface $atCreated): self
    {
        $this->atCreated = $atCreated;

        return $this;
    }

    public function getIsActivate(): ?bool
    {
        return $this->isActivate;
    }

    public function setIsActivate(bool $isActivate): self
    {
        $this->isActivate = $isActivate;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCompteEntreprise(): ?bool
    {
        return $this->compteEntreprise;
    }

    public function setCompteEntreprise(bool $compteEntreprise): self
    {
        $this->compteEntreprise = $compteEntreprise;

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
            $publication->setIdUser($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->contains($publication)) {
            $this->publications->removeElement($publication);
            // set the owning side to null (unless already changed)
            if ($publication->getIdUser() === $this) {
                $publication->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setIdUser($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): self
    {
        if ($this->pictures->contains($picture)) {
            $this->pictures->removeElement($picture);
            // set the owning side to null (unless already changed)
            if ($picture->getIdUser() === $this) {
                $picture->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setIdUser($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getIdUser() === $this) {
                $message->setIdUser(null);
            }
        }

        return $this;
    }

    // /**
    //  * @return Collection|Abo[]
    //  */
    // public function getAbos(): Collection
    // {
    //     return $this->abos;
    // }

    // public function addAbo(Abo $abo): self
    // {
    //     if (!$this->abos->contains($abo)) {
    //         $this->abos[] = $abo;
    //         $abo->addIdUser($this);
    //     }

    //     return $this;
    // }

    // public function removeAbo(Abo $abo): self
    // {
    //     if ($this->abos->contains($abo)) {
    //         $this->abos->removeElement($abo);
    //         $abo->removeIdUser($this);
    //     }

    //     return $this;
    // }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setIdUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdUser() === $this) {
                $commentaire->setIdUser(null);
            }
        }

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
