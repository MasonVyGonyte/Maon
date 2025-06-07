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
            'template_path' => '/templates/conference/index.html.twig' 
      
        ]);
    }
    
    #[Route('/submit', name: 'handle_form', methods: ['POST'])]
public function handleForm(Request $request): Response
{
    $documentType = $request->request->get('document_type');
    // Получаем данные из формы
    $name = $request->request->get('name');
    $secondName = $request->request->get('secondName');
    $thirdName = $request->request->get('thirdName');
    $age = $request->request->get('age');
    $numberPassport = $request->request->get('numberPassport');
    $serialPassport = $request->request->get('serialPassport');
    $passportIssuedBy = $request->request->get('passportIssuedBy');
    $passportDate = $request->request->get('passportDate');
    $address = $request->request->get('address');

    // Второй набор данных
    $name2 = $request->request->get('name2');
    $secondName2 = $request->request->get('secondName2');
    $thirdName2 = $request->request->get('thirdName2');
    $age2 = $request->request->get('age2');
    $numberPassport2 = $request->request->get('numberPassport2');
    $serialPassport2 = $request->request->get('serialPassport2');
    $passportIssuedBy2 = $request->request->get('passportIssuedBy2');
    $passportDate2 = $request->request->get('passportDate2');
    $address2 = $request->request->get('address2');

    // Получаем сессию
    $session = $request->getSession();

    // Сохраняем данные из первого набора
    $session->set('name', $name);
    $session->set('secondName', $secondName);
    $session->set('thirdName', $thirdName);
    $session->set('age', $age);
    $session->set('numberPassport', $numberPassport);
    $session->set('serialPassport', $serialPassport);
    $session->set('passportIssuedBy', $passportIssuedBy);
    $session->set('passportDate', $passportDate);
    $session->set('address', $address);

    // Сохраняем данные из второго набора
    $session->set('name2', $name2);
    $session->set('secondName2', $secondName2);
    $session->set('thirdName2', $thirdName2);
    $session->set('age2', $age2);
    $session->set('numberPassport2', $numberPassport2);
    $session->set('serialPassport2', $serialPassport2);
    $session->set('passportIssuedBy2', $passportIssuedBy2);
    $session->set('passportDate2', $passportDate2);
    $session->set('address2', $address2);

    

    // Сохраняем document_type в сессии
    $session->set('document_type', $documentType);

    return $this->redirectToRoute('generate_word'); 
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
