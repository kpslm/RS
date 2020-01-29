<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register()
    {
        $user = new User;
        $form = $this -> createForm(UserType::class, $user);

        return $this->render('user/register.html.twig', ['RegisterForm'=>$form -> createView()]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('user/login.html.twig', []);
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

     /**
     * @Route("/message", name="message")
     */
    public function message()
    {
        return $this->render('user/message.html.twig', []);
    }

      /**
     * @Route("/notification", name="notification")
     */
    public function notification()
    {
        return $this->render('user/notification.html.twig', []);
    }

}
