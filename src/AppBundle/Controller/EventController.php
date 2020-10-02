<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{

    public function newAction()
    {
        return $this->render('AppBundle:Event:new.html.twig');
    }

}
