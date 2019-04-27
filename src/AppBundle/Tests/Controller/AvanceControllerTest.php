<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AvanceControllerTest extends WebTestCase
{
    public function testHistoryavance()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/historyavance');
    }

}
