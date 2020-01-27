<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EntrepriseController extends AbstractController
{
    /**
     * @Route("/user1000", name="user1000")
     */
    public function index()
    {
        return $this->render('entreprise/user1000.html.twig', []);
    }
}
