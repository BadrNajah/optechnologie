<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LentileControllerTest extends WebTestCase
{
    public function testAddlent()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addlent');
    }

}
