<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\User;
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

        $repository = $this->getDoctrine()->getRepository(User::class);


        $data = json_decode($request->getContent(), true);


//        $username = $request->get('username');
       $username= isset($data['username']) ? $data['username'] : null;
//        $password = isset($data['password']) ? $data['password'] : null;

//            $user_db=$repository->find($username);
//
//
//            $username_db = $user_db->getUsername();
//            $password_db = $user_db->getPassword();
//            if($username == $username_db) {
//                return new JsonResponse(['message'=>'POST response work!']);
//            }


        return new JsonResponse(['result' => 'ok', 'ret' => ['username' => $username]]);

    }


}
