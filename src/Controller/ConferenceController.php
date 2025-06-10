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
    $phone = $request->request->get('phone');
    $email = $request->request->get('email');



// Сохраняем данные в сессии


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
    $phone2 = $request->request->get('phone2');
    $email2 = $request->request->get('email2');


$name3 = $request->request->get('name3');
$secondName3 = $request->request->get('secondName3');
$thirdName3 = $request->request->get('thirdName3');
$numberPassport3 = $request->request->get('numberPassport3');
$serialPassport3 = $request->request->get('serialPassport3');
$passportIssuedBy3 = $request->request->get('passportIssuedBy3');
$passportDate3 = $request->request->get('passportDate3');
$address3 = $request->request->get('address3');
$phone3 = $request->request->get('phone3');
$email3 = $request->request->get('email3');



    $name4 = $request->request->get('name4');
$secondName4 = $request->request->get('secondName4');
$thirdName4 = $request->request->get('thirdName4');
$name5 = $request->request->get('name5');
$secondName5 = $request->request->get('secondName5');
$thirdName5 = $request->request->get('thirdName5');
$bday = $request->request->get('bday');
$blocation = $request->request->get('blocation');
$serialSvid = $request->request->get('serialSvid');
$numSvid = $request->request->get('numSvid');
$svidIssuedBy = $request->request->get('svidIssuedBy');
$svidDate = $request->request->get('svidDate');
$address4 = $request->request->get('address4');

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
    $session->set('phone', $phone);
    $session->set('email', $email);

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
    $session->set('phone2', $phone2);
    $session->set('email2', $email2);

    // Сохраняем данные в сессии
$session->set('name3', $name3);
$session->set('secondName3', $secondName3);
$session->set('thirdName3', $thirdName3);
$session->set('numberPassport3', $numberPassport3);
$session->set('serialPassport3', $serialPassport3);
$session->set('passportIssuedBy3', $passportIssuedBy3);
$session->set('passportDate3', $passportDate3);
$session->set('address3', $address3);
$session->set('phone3', $phone3);
$session->set('email3', $email3);


    $session->set('name4', $name4);
$session->set('secondName4', $secondName4);
$session->set('thirdName4', $thirdName4);
$session->set('name5', $name5);
$session->set('secondName5', $secondName5);
$session->set('thirdName5', $thirdName5);
$session->set('bday', $bday);
$session->set('blocation', $blocation);
$session->set('serialSvid', $serialSvid);
$session->set('numSvid', $numSvid);
$session->set('svidIssuedBy', $svidIssuedBy);
$session->set('svidDate', $svidDate);
$session->set('address4', $address4);

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
