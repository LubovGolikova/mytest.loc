<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $plainPassword = 'ryanpass';
            $encoded = $encoder->encodePassword($user, $plainPassword);
            $user->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect('alluser');
            }
            return $this->render('register.html.twig', ['form'=>$form->createView()]);
    }

    /**
     * @Route("/alluser", name="alluser")
     */
    public function alluserAction(Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(User::class);

        $users = $repository
            ->findAll();

        return $this->render('alluser.html.twig',[
            'users' => $users
        ]);
    }
}
