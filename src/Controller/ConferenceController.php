<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConferenceController extends AbstractController
{

    #[Route('/conference', name: 'show_conference')]
    public function showForm(): Response
    {
        return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
            'controller_path' => __FILE__,
            'template_path' => '/templates/conference/index.html.twig' // Путь к шаблону (передаём как строку)
      
        ]);
    }

    #[Route('/submit', name: 'handle_form', methods: ['POST'])]
    public function handleForm(Request $request): Response
    {
        $name = $request->request->get('name');
        $secondName = $request->request->get('secondName');
        $thirdName = $request->request->get('thirdName');
        $age = $request->request->get('age');

        // Здесь можно сделать обработку, например, сохранение данных в базе данных

        return new Response("Принято: Имя - $name, Возраст - $age");
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return new Response(<<<EOF
                    <html>
                        <body>
                           <img src="/images/1.jpg" />
                       </body>
                    </html>
                    EOF
                );
    }
}
