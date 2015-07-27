<?php

namespace elever\ClienteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/cliente/');

        $this->assertTrue($crawler->filter('html:contains("cliente")')->count() > 0);
    }
}
