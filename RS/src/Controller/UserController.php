<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Publication;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class UserController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = $this->getUser();
        if ( $user!= null) {
            return $this->redirectToRoute('profil');
        }
        $user = new User;
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setAtCreated(new \DateTime('now'));
            $user->setIsActivate(true);
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);



            $manager->flush();

            $this->addFlash('success', ' Bienvenue parmis nous ' . $user->getPrenom() . ' tu es desormais inscris');
            //afficher la vue 
            return $this->redirectToRoute('login');
        }

        return $this->render('user/register.html.twig', ['RegisterForm' => $form->createView()]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {

        $user = $this->getUser();
        if ($user != null) {
            return $this->redirectToRoute('profil');
        }
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('user/login.html.twig', [
            'error' => $error,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {
        $user = $this->getUser();
        $repository = $this ->getDoctrine() -> getRepository(Publication::class);
        $publi = $repository -> findAllPublication($user);
        return $this->render('user/profil.html.twig', ['publi' => $publi]);


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
