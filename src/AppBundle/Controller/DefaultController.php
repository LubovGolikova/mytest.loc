<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Event;
class DefaultController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function adminAction()
    {

        return new Response('<html><body>Admin page!</body></html>');
    }
    /**
     * @Route("/createevent")
     */
    public function newAction(Request $request)
    {
        return $this->render('createevent.html.twig');
    }
    /**
     * @Route("/addevent", name="addevents")
     */
    public function addAction()
    {
        return $this->render('new.html.twig',['form'=> $form->createView()]);

    }
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/events")
     */
    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);

        $events = $repository->findAll();

        return $this->render('events.html.twig',[
            'events' => $events
        ]);

    }





}
