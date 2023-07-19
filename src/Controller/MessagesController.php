<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

#[Route('/message')]
class MessagesController extends AbstractController
{
    #[Route('/', name: 'app_message_index', methods: ['GET'])]
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $messages = $em->getRepository(Messages::class)->findAll();

        return new JsonResponse($messages);
    }

    #[Route('/send', name: 'app_send_message', methods: ['POST'])]
    public function send(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $message = new Messages;
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setSender($this->getUser());
            $em->persist($message);
            $em->flush();

            return new JsonResponse(['message' => 'Message envoyé avec succès']);
        }

        return new JsonResponse(['message' => 'Erreur lors de l\'envoi du message'], 400);
    }

    #[Route('/received', name: 'app_received_messages', methods: ['GET'])]
    public function received(EntityManagerInterface $em): JsonResponse
    {
        $receivedMessages = $em->getRepository(Messages::class)->findBy([
            'receiver' => $this->getUser(),
        ]);

        return new JsonResponse($receivedMessages);
    }


    #[Route('/read/{id}', name: 'app_read_messages', methods: ['GET'])]
    #[ParamConverter('message', options: ['mapping' => ['id' => 'id']])]
    public function read(Messages $message, EntityManagerInterface $em): JsonResponse
    {
        $message->setIsRead(true);
        $em->persist($message);
        $em->flush();

        return new JsonResponse($message);
    }

    #[Route('/delete/{id}', name: 'app_delete_messages', methods: ['DELETE'])]
    public function delete(Messages $message, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($message);
        $em->flush();

        return new JsonResponse(['message' => 'Message supprimé avec succès']);
    }

    #[Route('/sent', name: 'app_sent_messages', methods: ['GET'])]
    public function sent(EntityManagerInterface $em): JsonResponse
    {

        $sentMessages = $em ->getRepository(Messages::class)->findBy([
            'sender' => $this->getUser(),
        ]);

        return new JsonResponse($sentMessages);
    }
}
