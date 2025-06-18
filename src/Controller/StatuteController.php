<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StatuteController extends AbstractController
{
    #[Route('/statute', name: 'app_statute')]
    public function index(): Response
    {
        return $this->render('statute/Statute.html.twig', [
            'controller_name' => 'StatuteController',
        ]);
    }
}
