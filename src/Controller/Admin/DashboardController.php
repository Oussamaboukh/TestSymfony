<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel;
use App\Entity\GroupeHotelier;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
      
        return $this->redirect($adminUrlGenerator->setController(GroupeHotelierCrudController::class)->generateUrl());

    }

    #[Route('/admin/logout', name: 'logout')]
    public function logout(): Response
    {
        
        return $this->redirect(path("/"));
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('TestSymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Hôtels', 'fas fa-list', Hotel::class);
        yield MenuItem::linkToCrud('Groupe Hôtels', 'fas fa-list', GroupeHotelier::class);
    }
}
