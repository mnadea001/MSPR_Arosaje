<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Plant;
use App\Entity\Advice;
use App\Entity\Message;
use App\Entity\PlantSitting;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();
        return $this->redirect($url);

      
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mspr Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Advice', 'fas fa-network-wired', Advice::class);
        yield MenuItem::linkToCrud('Message', 'fas fa-list', Message::class);
        yield MenuItem::linkToCrud('User', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Plant', 'fas fa-users', Plant::class);
        yield MenuItem::linkToCrud('PlantSitting', 'fas fa-users', PlantSitting::class);
        yield MenuItem::linkToRoute('Back to website', 'fas fa-home', 'app_home');
    }
}
