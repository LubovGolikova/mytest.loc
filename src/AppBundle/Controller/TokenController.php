<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class TokenController extends Controller
{


    /**
     * @Route("/tokens", name="tokens_get", methods={"GET"})
     */
    public function getTokenAction()
    {
           return new Response ('Get response work', 201);
//        return $this->render('AppBundle:Token:new_token.html.twig', array(
//            // ...
//        ));
    }
    /**
     * @Route("/tokens", name="tokens_post", methods={"Post"})
     */
    public function postTokenPostAction()
    {
        return new Response ('POST response work', 201);
//        return $this->render('AppBundle:Token:new_token.html.twig', array(
//            // ...
//        ));
    }



//
//    /**
//     * @Route("/tokens", name="tokens", methods={"Post","GET"})
//     */
//    public function newTokenPostAction()
//    {
//        return new Response ('POST response work', 201);
////        return $this->render('AppBundle:Token:new_token.html.twig', array(
////            // ...
////        ));
//    }
}
