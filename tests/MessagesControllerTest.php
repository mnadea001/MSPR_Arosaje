<?php

namespace App\tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpClient\HttpClient;

class MessagesControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);
        $response = $client->request('GET', 'https://localhost:8000/message/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testSend(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);
        $response = $client->request('POST', 'http://localhost:8000/message/send', [
            'body' => json_encode(['content' => 'Test message']),
            'headers' => ['Content-Type' => 'application/json'],
        ]);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testReceived(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);
        $response = $client->request('GET', 'http://localhost:8000/message/received');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testRead(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);        
        $response = $client->request('GET', 'http://localhost:8000/message/read/1');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testDelete(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);   
        $response = $client->request('DELETE', 'http://localhost:8000/message/delete/1');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }

    public function testSent(): void
    {
        $client = HttpClient::create(['verify_peer' => false]);   
        $response = $client->request('GET', 'http://localhost:8000/message/sent');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
}