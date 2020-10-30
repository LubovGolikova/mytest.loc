<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ChatControllerController extends Controller
{
    /**
     * @Route("/chat", name="chat")
     */
    public function chatAction()
    {
        return $this->render('chat/chat.html.twig');
    }
    /**
     * @Route("/chatadmin", name="chatadmin")
     */
    public function adminchatAction()
    {
        return $this->render('chat/admin-chat.html.twig');
    }

}
