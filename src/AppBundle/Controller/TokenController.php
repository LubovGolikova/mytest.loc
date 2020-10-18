<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
//use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
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
     * @Route("/logintoken", name="login_token", methods={"POST"})
     */
    public function loginTokenPostAction(Request $request)
    {
//        $username = $request->get('username');
//        return new JsonResponse($username);
        $user = $this->getUser();
//        $token = $JWTManager->create($user);
        $token= $request->get('username');
        return new JsonResponse($token);
////        return $this->json([
////            'username' => $user->getUsername(),
////            'roles' => $user->getRoles()
////        ]);
///
//        $token = JWT:encode($user, $key);
//
    }
    /**
     * @Route("/usertokens", name="user_tokens", methods={"POST"})
     */
    public function userTokenAction(Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(User::class);
//        $username = $request->get('username');
        $data = json_decode($request->getContent(), true);

        $username = isset($data['username']) ? $data['username'] : null;
        $query = $repository->createQueryBuilder('p')
            ->select('p.id')
            ->where('p.username=:Username')
            ->setParameter('Username', $username)
            ->getQuery();

        $users = $query->getResult();

        $result = 'user does not exist!';
        if($users){
            $token = bin2hex(random_bytes(15));
            $request->getSession()->set('token', $token);
            $result = $token;
        }

        return new JsonResponse(['token'=> $result]);

    }
    /**
     * @Route("/tokenscheck", name="tokens_check", methods={"POST"})
     */
    public function checkTokenPostAction(Request $request)
    {
        $result =  $request->getSession()->get('token') == $request->headers->get('authorization') ? 'user exists!' : 'user does not exist!';
        return new JsonResponse(['message'=> $result]);
    }

/**
 * @Route("/tokens", name="tokens_post", methods={"POST"})
 */
public function postTokenPostAction(Request $request)
{
//        $username = $request->get('username');
//        return new JsonResponse($username);
    $repository = $this->getDoctrine()->getRepository(User::class);

    $data = json_decode($request->getContent(), true);

    $apiToken= isset($data['apiToken']) ? $data['apiToken'] : null;

    $query = $repository->createQueryBuilder('p')
        ->select('p.id')
        ->where('p.apiToken= :Token')
        ->setParameter('Token', $apiToken)
        ->getQuery();

    $users = $query->getResult();
    $result = $users ? 'user exists!' : 'user does not exist!';

    return new JsonResponse(['message'=> $result]);

}

}