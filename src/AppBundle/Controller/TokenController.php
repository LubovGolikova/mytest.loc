<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
class TokenController extends Controller
{

    /**
     * @Route("/tokens", name="tokens_get", methods={"GET"})
     */
    public function getTokenAction(Request $request)
    {
           return new JsonResponse(['message'=>'Get response work!']);
    }


    /**
     * @Route("/tokens", name="tokens_post", methods={"POST"})
     */
    public function postTokenPostAction(Request $request)
    {

        $data = $request->getContent();
        $userdata= json_decode($data, true);
        return new JsonResponse($userdata);

    }


}
