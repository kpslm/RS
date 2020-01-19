<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        return $this->render('user/register.html.twig', []);
    }

      /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        return $this->render('user/profil.html.twig', []);
    }

       /**
     * @Route("/galery", name="galery")
     */
    public function galery()
    {
        return $this->render('user/galery.html.twig', []);
    }

      /**
     * @Route("/picture", name="picture")
     */
    public function picture()
    {
        return $this->render('user/picture.html.twig', []);
    }

      /**
     * @Route("/searchFriends", name="searchFriends")
     */
    public function searchFriends()
    {
        return $this->render('user/searchFriends.html.twig', []);
    }
}
