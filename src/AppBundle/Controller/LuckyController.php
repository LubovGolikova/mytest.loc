<?php
namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class LuckyController
{
    /**
     * @Route("/lucky")
     */
    public function numberAction()
    {
        $number = random_int(0,100);

        return new Response(
          '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}