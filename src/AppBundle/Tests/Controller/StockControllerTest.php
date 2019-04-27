<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StockControllerTest extends WebTestCase
{
    public function testListstock()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/liststock');
    }

}
