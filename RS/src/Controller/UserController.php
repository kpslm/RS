<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Entity\Commentaire;
use App\Entity\Like;
use App\Entity\Picture;
use App\Entity\User;
use App\Form\UserType;
use App\Entity\Publication;
use App\Form\PublicationType;
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
        if ($user != null) {
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
    public function profil(Request $request)
    {
        $user = $this->getUser();

        $repository = $this->getDoctrine()->getRepository(Publication::class);
        $publi = $repository->findAllPublication($user);
        $time = [];
        foreach ($publi as $key => $value) {
            $u = $value->getDate();
            $stringValue = $u->format('Y-m-d H:i:s');
            $datetime1 = new \DateTime(); // date actuelle
            $datetime2 = new \DateTime($stringValue);
            $date = $datetime1->diff($datetime2, true); // le y = nombre d'années ex : 22
            $time[] = $date;
        }

        $publication = new Publication;
        $formpub = $this->createForm(PublicationType::class, $publication);
        $formpub->handleRequest($request);

        if ($formpub->isSubmitted() && $formpub->isValid()) {
            $publication->setDate(new \DateTime('now'));
            $publication->setUser($user);
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($publication);



            $manager->flush();
            return $this->redirectToRoute('profil');
        }

       
        // $re = $this->getDoctrine()->getRepository(Actu::class);
        // $actu = $re->findAll();

        // $rep = $this->getDoctrine()->getRepository(Commentaire::class);
        // $com = $rep->findAll();

        // $repos = $this->getDoctrine()->getRepository(Picture::class);
        // $picture = $repos->findAll();

        // $repo = $this->getDoctrine()->getRepository(Like::class);
        // $like = $repo->findAll();


        return $this->render('user/profil.html.twig', [
            'publi' => $publi,
            'PublicationForm' => $formpub->createView(),
            'time' => $time,
            // 'like'=>  $like,
            // 'pic' => $picture,
            // 'com' => $com,
            // 'actu' => $actu,
            // 'pub' => $publica

        ]);
    }

    /**
     * @Route("/galery", name="galery")
     */
    public function galery()
    {
        $user = $this->getUser();
        $repo = $this->getDoctrine()->getRepository(Picture::class);
        $pic= $repo->findAllPicture($user);
        

        return $this->render('user/galery.html.twig', [ 'pic' => $pic,]);
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
