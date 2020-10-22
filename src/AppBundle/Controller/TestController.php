<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class TestController extends Controller
{
    public function showArgs(...$args)
    {
        dump($args);
    }

    /**
     * @Route("/test", name="test", methods={"GET"})
     */
    public function testAction(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addListener('dump_event_args', [$this, 'showArgs']);
        $dispatcher->dispatch('dump_event_args');

        return new Response('<p>Test events</p>');
    }

}
