<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class KabController extends AbstractController
{
    #[Route('/kab', name: 'show_kab')]
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils, Security $security)
    {
        // Проверяем, если пользователь уже аутентифицирован
        $user = $security->getUser();
        if ($user) {
            // Если пользователь уже авторизован, перенаправляем его на страницу конференции
            return $this->redirectToRoute('show_conference');
        }

        // Получаем ошибку логина, если она есть
        $error = $authenticationUtils->getLastAuthenticationError();

        // Последнее введённое имя пользователя
        $lastUsername = $authenticationUtils->getLastUsername();

        // Отображаем форму входа
        return $this->render('conference/kab.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Symfony автоматически обрабатывает этот маршрут
    }
}
