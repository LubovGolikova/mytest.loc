<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChatControllerControllerTest extends WebTestCase
{
    public function testChat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chat');
    }

}
