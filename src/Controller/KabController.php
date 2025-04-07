<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;

class KabController extends AbstractController
{
    #[Route('/kab', name: 'show_kab')]
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // Получаем ошибку логина, если она есть
    

        return $this->render('conference/kab.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
    }
}



