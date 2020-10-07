<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
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
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder)
    {

        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash("success", "Welcome to our application");

            return $this->redirectToRoute("security_login");

//            $token = new UsernamePasswordToken(
//                $user,
//                $password,
//                'main',
//                $user->getRoles()
//            );
//            $this->get('security.token_storage')->setToken($token);


            }
            return $this->render('auth/register.html.twig', ['form'=>$form->createView()]);
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

        return $this->render('admin/alluser.html.twig',[
            'users' => $users
        ]);
    }


}
