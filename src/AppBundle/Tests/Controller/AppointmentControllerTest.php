<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AppointmentControllerTest extends WebTestCase
{
    public function testListapp()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'listeappointment');
    }

}
