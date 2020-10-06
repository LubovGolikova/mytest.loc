<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            /*$user = $form->getData();
            $password = $user->getPlainpassword();
            $user->setPassword($password );*/
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect('events');
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
