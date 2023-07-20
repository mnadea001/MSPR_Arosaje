<?php
namespace App\Tests\unit;

use App\Entity\Messages;
use App\Entity\Plant;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EntityMessagesTest extends TestCase {

    private Messages $messages;
    private User $sender;
    private User $recepient;
    private \DateTime $dateTime;



    public function setUp(): void
    {
        parent::setUp();

        $title = "Test Title";
        $messageText = "Test message content";
        $createdAt = new \DateTime();
        $isRead = true;


        $this->messages = new Messages();
        $this->sender = new User();
        $this->recepient = new User();

        $this->messages->setTitle($title);
        $this->messages->setMessage($messageText);
        $this->messages->setCreatedAt($createdAt);
        $this->messages->setIsRead($isRead);
        $this->messages->setSender($this->sender);
        $this->messages->setRecepient($this->recepient);

    }

    public function test_is_it_true(): void
    {
        $this->assertEquals("Test Title",  $this->messages->getTitle());
        $this->assertEquals("Test message content",  $this->messages->getMessage());
        $this->assertEquals( new \DateTime(),  $this->messages->getCreatedAt());
        $this->assertEquals(true,  $this->messages->IsRead());
        $this->assertEquals($this->sender,  $this->messages->getSender());
        $this->assertEquals($this->recepient,  $this->messages->getRecepient());
    }



    public function test_is_it_empty(): void
    {
        $message = new Messages();

        // Test des propriétés initialisées à null
        $this->assertNull($message->getTitle());
        $this->assertNull($message->getMessage());
        $this->assertNull($message->getCreatedAt());
        $this->assertNull($message->isRead());
        $this->assertNull($message->getSender());
        $this->assertNull($message->getRecepient());
    }
}
