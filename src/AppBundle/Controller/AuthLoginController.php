<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class AuthLoginController extends Controller
{

    /**
     * @Route("/myauth", name="auth_get", methods={"GET"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function authgetAction()
    {
        return new JsonResponse(['message'=>'Get response work!']);
    }

    /**
     * @Route("/myauth", name="auth_post", methods={"POST"})
     * @param JWTTokenManagerInterface $JWTManager
     * @param Request $request
     * @return JsonResponse
     */
    public function authpostAction(Request $request, JWTTokenManagerInterface $JWTManager)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $data = json_decode($request->getContent(), true);

        $username = isset($data['username']) ? $data['username'] : null;
        $query = $repository->createQueryBuilder('p')
            ->select('p.id')
            ->where('p.username=:Username')
            ->setParameter('Username', $username)
            ->getQuery();

        $user = $query->getResult();

        //var1
//       $token = $this->get('lexik_jwt_authentication.jwt_manager')->create($user);
//        return new JsonResponse($token);

        //var2
        return new JsonResponse(['token'=> $JWTManager->create($user)]);

        //var3
//        $token = $JWTManager->create($user);
//        return new JsonResponse($token);
    }


    /**
     * @Route("/authversion2", name="get_auth_version2", methods={"GET"})
     * @return JsonResponse
     */
    public function getAuthVersion2Action()
    {
        return new JsonResponse(['message'=>'Get response work!']);
    }

    /**
     * @Route("/authversion2", name="post_auth_version2", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function authloginAction(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');


        return new JsonResponse($username);
    }
}
