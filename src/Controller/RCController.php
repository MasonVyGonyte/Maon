<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class RCController extends AbstractController
{
    #[Route('/register', name: 'app_reg')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        $lastUsername = '';  // Изначально пустая строка
        $errorMessage = '';  // Изначально нет ошибки

        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $plainPassword = $request->request->get('password');
            $plainPassword1 = $request->request->get('passAgain');

            // Проверяем, существует ли уже пользователь с таким логином
            $existingUser = $em->getRepository(User::class)->findOneBy(['username' => $username]);

            if ($existingUser) {
                // Если логин уже существует, выводим ошибку
                $errorMessage = 'Пользователь с таким логином уже существует. Пожалуйста, выберите другой логин.';
            } else {
                // Если логин уникален, продолжаем регистрацию
                $user = new User();
                $user->setUsername($username);
                $user->setRoles(['ROLE_USER']);

                $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
                $user->setPassword($hashedPassword);

                // Не нужно хешировать пароль повторно, просто добавим один из паролей
                $user->setPassword1($hashedPassword);

                // Сохраняем пользователя в базе данных
                $em->persist($user);
                $em->flush();

                return $this->redirectToRoute('show_kab'); // После регистрации перенаправляем на страницу кабинета
            }
        }

        // Отображаем форму регистрации с возможной ошибкой
        return $this->render('registration/reg.html.twig', [
            'last_username' => $lastUsername,  // Передаем переменную в шаблон
            'error_message' => $errorMessage,  // Передаем сообщение об ошибке
        ]);
    }
}
