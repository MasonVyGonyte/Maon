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
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $plainPassword = $request->request->get('password');
            $plainPassword1 = $request->request->get('passAgain');

            $user = new User();
            $user->setUsername($username);
            $user->setRoles(['ROLE_USER']);

            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            $hashedPassword1 = $passwordHasher->hashPassword($user, $plainPassword1);
            $user->setPassword1($hashedPassword1);

           // dump($request->request->all());
           // die();
            
           $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('show_kab'); // после регистрации — на логин
        }

        

        return $this->render('registration/reg.html.twig', [
            'last_username' => $lastUsername,  // Передаем переменную в шаблон
        ]);
    }
}

/*

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Troller extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        if ($request->isMethod('POST')) {
            $username = $request->request->get('username');
            $plainPassword = $request->request->get('password');

            $user = new User();
            $user->setUsername($username);
            $user->setRoles(['ROLE_USER']);

            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('show_kab'); // после регистрации — на логин
        }

        return $this->render('registration/reg.html.twig');
    }
}*/
