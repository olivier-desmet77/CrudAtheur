<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPublishingHouseController extends AbstractController
{
    #[Route('/admin/publishing/house', name: 'app_admin_publishing_house')]
    public function index(): Response
    {
        return $this->render('admin_publishing_house/index.html.twig', [
            'controller_name' => 'AdminPublishingHouseController',
        ]);
    }
}
