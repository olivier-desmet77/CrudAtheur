<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAuthorController extends AbstractController
{
    #[Route('/admin/author', name: 'app_admin_author')]
    public function index(): Response
    {
        return $this->render('admin_author/index.html.twig', [
            'controller_name' => 'AdminAuthorController',
        ]);
    }
}
