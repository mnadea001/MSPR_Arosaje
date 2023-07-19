<?php

namespace App\tests\functional\controllers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MessageControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/message/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Messages');
    }

    public function testNew(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/message/new');

        $form = $crawler->selectButton('Save')->form();
        $form['message[content]'] = 'Test message';

        $client->submit($form);

        $this->assertResponseRedirects('/message/');
    }

    public function testShow(): void
    {
        $client = static::createClient();
        $client->request('GET', '/message/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Message');
    }

    public function testEdit(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/message/1/edit');

        $form = $crawler->selectButton('Save')->form();
        $form['message[content]'] = 'Updated message';

        $client->submit($form);

        $this->assertResponseRedirects('/message/');
    }

    public function testDelete(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/message/1');

        $client->submit($crawler->filter('#delete-form')->form());

        $this->assertResponseRedirects('/message/');
    }
}
