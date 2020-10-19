<?php

namespace AppBundle\Controller;

use AppBundle\Event\RegisteredUserEvent;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder, EventDispatcherInterface $eventDispatcher)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $token = new UsernamePasswordToken(
                $user,
                null,
                'main',
                $user->getRoles()
            );
            $this->get('security.token_storage')->setToken($token);
            $user->setApiToken($token );


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $userRegisteredEvent = new RegisteredUserEvent($user);
            $eventDispatcher->dispatch(RegisteredUserEvent::NAME, $userRegisteredEvent);

            return $this->redirectToRoute('events');

            }
        return $this->render('auth/register.html.twig', ['form'=>$form->createView()]);

    }




}
