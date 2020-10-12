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
