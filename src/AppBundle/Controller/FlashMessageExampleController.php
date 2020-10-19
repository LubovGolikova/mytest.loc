<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
class FlashMessageExampleController extends Controller
{
    /**
     * @Route("/flash", name="flash_message_example")
     */
    public function flashMessageExampleAction()
    {
        $this->addFlash('success', 'something went <a href="/" class="alert-link">well!</a>');
        $this->addFlash('info', 'some <a href="/" class="alert-link">important info</a>.');
        $this->addFlash('warning', 'uh oh, that didn\'t quite <a href="/" class="alert-link">work right</a>');
        $this->addFlash('danger', 'danger <a href="/" class="alert-link">Will Robinson!</a>');

        return $this->render('flash-messages.html.twig');
    }

}
