<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthLoginControllerTest extends WebTestCase
{
    public function testAuth()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/auth');
    }

}
