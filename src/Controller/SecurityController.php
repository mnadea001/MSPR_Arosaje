<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/api/login_check', name: 'api_login_check', methods: ['POST'])]
    public function login()
    {
        $user = $this->getUser();

        return $this->json([
            'username' => $user->getUserName(),
            'roles' => $user->getRoles()
        ]);

    }

    #[Route('/api/logout', name: 'api_logout', methods: ['POST'])]
    public function logout(){}
}
