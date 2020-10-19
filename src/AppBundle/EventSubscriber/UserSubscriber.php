<?php

namespace AppBundle\EventSubscriber;

use AppBundle\Event\RegisteredUserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
class UserSubscriber implements EventSubscriberInterface
{

    public function __construct()
    {
        return array(
            'message' => 'onUserRegister'
        );
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            RegisteredUserEvent::NAME => 'onUserRegister'
        ];
    }

    /**
     * @param RegisteredUserEvent $registeredUserEvent
     */
    public function onUserRegister(RegisteredUserEvent $registeredUserEvent)
    {
        $session = new Session();
        $session->getFlashBag()->add("success", "This is a success message");
    }
}