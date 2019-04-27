<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MontControllerTest extends WebTestCase
{
    public function testAdd_mont_dir()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add_mont_dir');
    }

}
