<?php

namespace App\tests\functional\controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class MessagesControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost/message/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testSend(): void
    {
        $client = HttpClient::create();
        $response = $client->request('POST', 'http://localhost/message/send', [
            'body' => json_encode(['content' => 'Test message']),
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testReceived(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost/message/received');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testRead(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost/message/read/1');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testDelete(): void
    {
        $client = HttpClient::create();
        $response = $client->request('DELETE', 'http://localhost/message/delete/1');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testSent(): void
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://localhost/message/sent');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
}