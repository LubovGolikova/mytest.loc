<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
//    public function loginAction(AuthenticationUtils $authenticationUtils)
    public function loginAction()
    {
        $helper = $this->get('security.authentication_utils');

        return $this->render('auth/login.html.twig',[
            'last_username' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError(),
        ]);





//
//        // get the login error if there is one
//        $error = $authenticationUtils->getLastAuthenticationError();
//
//        // last username entered by the user
//        $lastUsername = $authenticationUtils->getLastUsername();
//
//        return $this->render('auth/login.html.twig', [
//            'last_username' => $lastUsername,
//            'error'         => $error,
//        ]);
    }
    /**
     * @Route("/logout", name="security_logout")
     */
    public function logoutAction()
    {
//        throw new \Exception('This should never be reached!');
    }

}
