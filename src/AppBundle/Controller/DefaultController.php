<?php

namespace AppBundle\Controller;


use AppBundle\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Event;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction()
    {

        return $this->render('admin/profile.html.twig');
    }
    /**
     * @Route("/alluser", name="alluser")
     */
    public function alluserAction()
    {

        $repository = $this->getDoctrine()
            ->getRepository(User::class);

        $users = $repository
            ->findAll();

        return $this->render('admin/alluser.html.twig',[
            'users' => $users
        ]);
    }

    /**
     * @Route("/addevent", name="addevent")
     */
    public function addAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file = $event->getPath();

            $event->setPath($this->upload($file));


            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirect('events');
        }
        return $this->render('new.html.twig', ['form'=>$form->createView()]);

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
     * @Route("/events", name="events")
     */
    public function showAction()
    {

        $repository = $this->getDoctrine()->getRepository(Event::class);

        $query = $repository->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.id', 'DESC')
            ->setFirstResult(0)
            ->setMaxResults(10)
            ->getQuery();

        $events = $query->getResult();

        return $this->render('events.html.twig',[
            'events' => $events
        ]);

    }
    /**
     * @Route("/event/{id}", name="event_id", methods={"GET"})
     */
    public function showIdAction(Event $eventId)
    {

        $repository = $this->getDoctrine()->getRepository(Event::class);

        $event = $repository->find($eventId);

        return $this->render('event.html.twig',[
            'event' => $event
        ]);

    }
    /**
     * @Route("/events/{id}/update", name="event_id_update" , methods={"GET","POST","PUT"})
     */
    public function updateAction(Request $request, Event $eventId)
    {

        $repository = $this->getDoctrine()->getRepository(Event::class);

        $event = $repository->find($eventId);

        $editForm = $this->createForm(EventType::class, $event);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            new File($event->getPath());
            $file=$event->getPath();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('photo_directory'),
                $fileName
            );

            $event->setPath($fileName );

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->render('edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
        ));

    }


    /**
     * @Route("/event/{id}/addLike", name="event_id_addlike", methods={"POST"})
     *
     */
    public function addLikeAction(Event $eventId)
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $event = $repository->find($eventId);
        $event->setLikes($event->getLikes()+1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return new Response($event->getLikes(),Response::HTTP_CREATED);

    }

    /**
     * @Route("/event/{id}/deleteLike", name="event_id_deletelike", methods={"DELETE"})
     *
     */
    public function deleteLikeAction(Event $eventId)
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
        $event = $repository->find($eventId);
        $event->setLikes($event->getLikes()-1);
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return new Response($event->getLikes(),Response::HTTP_CREATED);

    }
    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->getParameter('photo_directory'),
            $fileName
        );
        return $fileName;
    }

}
