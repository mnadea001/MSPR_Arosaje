<?php

namespace App\tests\functional\controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('GET', '/message/');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testSend(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('POST', '/message/send', [], [], [], json_encode(['content' => 'Test message']));

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testReceived(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('GET', '/message/received');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testRead(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('GET', '/message/read/1');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testDelete(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('DELETE', '/message/delete/1');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testSent(): void
    {
        $client = static::createKernel()->getContainer()->get('test.client');
        $client->request('GET', '/message/sent');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
    }
}
