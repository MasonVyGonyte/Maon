<?php

namespace App\Controller;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class WordFileController extends AbstractController
{
    #[Route('/download-word', name: 'generate_word')]
    public function generateWord(Request $request): Response
    {
        
        

        $session = $request->getSession();

        $documentType = $session->get('document_type');

        $name = $session->get('name');
        $secondName = $session->get('secondName');
        $thirdName = $session->get('thirdName');
        $age = $session->get('age');
        $numberPassport = $session->get('numberPassport');
        $serialPassport = $session->get('serialPassport');
        $passportIssuedBy = $session->get('passportIssuedBy');
        $passportDate = $session->get('passportDate');
        $address = $session->get('address');
        $phone = $session->get('phone');
        $email = $session->get('email');

        $name2 = $session->get('name2');
        $secondName2 = $session->get('secondName2');
        $thirdName2 = $session->get('thirdName2');
        $age2 = $session->get('age2');
        $numberPassport2 = $session->get('numberPassport2');
        $serialPassport2 = $session->get('serialPassport2');
        $passportIssuedBy2 = $session->get('passportIssuedBy2');
        $passportDate2 = $session->get('passportDate2');
        $address2 = $session->get('address2');
        $phone2 = $session->get('phone2');
        $email2 = $session->get('email2');

        $name3 = $session->get('name3');
$secondName3 = $session->get('secondName3');
$thirdName3 = $session->get('thirdName3');
$numberPassport3 = $session->get('numberPassport3');
$serialPassport3 = $session->get('serialPassport3');
$passportIssuedBy3 = $session->get('passportIssuedBy3');
$passportDate3 = $session->get('passportDate3');
$address3 = $session->get('address3');
$phone3 = $session->get('phone3');
$email3 = $session->get('email3');

// Обновляем шаблон для doc3


        $name4 = $session->get('name4');
$secondName4 = $session->get('secondName4');
$thirdName4 = $session->get('thirdName4');
$name5 = $session->get('name5');
$secondName5 = $session->get('secondName5');
$thirdName5 = $session->get('thirdName5');
$bday = $session->get('bday');
$blocation = $session->get('blocation');
$serialSvid = $session->get('serialSvid');
$numSvid = $session->get('numSvid');
$svidIssuedBy = $session->get('svidIssuedBy');
$svidDate = $session->get('svidDate');
$address4 = $session->get('address4');

$name6 = $session->get('name6');
$secondName6 = $session->get('secondName6');
$thirdName6 = $session->get('thirdName6');
$bday2 = $session->get('bday2');
$numberPassport4 = $session->get('numberPassport4');
$serialPassport4 = $session->get('serialPassport4');
$passportIssuedBy4 = $session->get('passportIssuedBy4');
$passportDate4 = $session->get('passportDate4');
$codeDep = $session->get('codeDep');
$address5 = $session->get('address5');
$phone4 = $session->get('phone4');
$email4 = $session->get('email4');

$name7 = $session->get('name7');
$secondName7 = $session->get('secondName7');
$thirdName7 = $session->get('thirdName7');
$name8 = $session->get('name8');
$secondName8 = $session->get('secondName8');
$thirdName8 = $session->get('thirdName8');
$bday3 = $session->get('bday3');
$serialSvid2 = $session->get('serialSvid2');
$numSvid2 = $session->get('numSvid2');
$svidIssuedBy2 = $session->get('svidIssuedBy2');
$svidDate2 = $session->get('svidDate2');
$address6 = $session->get('address6');
$schoolInfo = $session->get('schoolInfo');
$phone5 = $session->get('phone5');
$phone6 = $session->get('phone6');

$name9 = $session->get('name9');
$secondName9 = $session->get('secondName9');
$thirdName9 = $session->get('thirdName9');
$name10 = $session->get('name10');
$secondName10 = $session->get('secondName10');
$thirdName10 = $session->get('thirdName10');
$bday4 = $session->get('bday4');
$numberPassport3 = $session->get('numberPassport3');
$serialPassport3 = $session->get('serialPassport3');
$passportIssuedBy3 = $session->get('passportIssuedBy3');
$passportDate3 = $session->get('passportDate3');
$schoolInfo2 = $session->get('schoolInfo2');
$phone7 = $session->get('phone7');
$phone8 = $session->get('phone8');
$address7 = $session->get('address7');

   
    $checkboxes = [];
for ($i = 1; $i <= 23; $i++) {
    $checkboxes['checkbox' . $i] = $session->get('checkbox' . $i);
}

$checkboxes2 = [];
for ($i = 24; $i <= 46; $i++) {
    $checkboxes2['checkbox' . $i] = $session->get('checkbox' . $i);
}


        $templates = [
            'doc1' => '/public/templates/d1.docx',
            'doc2' => '/public/templates/d2.docx',
            'doc3' => '/public/templates/d3.docx',
            'doc4' => '/public/templates/d4.docx',
            'doc5' => '/public/templates/d5.docx',
            'doc6' => '/public/templates/d6.docx',
            'doc7' => '/public/templates/d7.docx',
        ];
       
        
        $templatePath = $this->getParameter('kernel.project_dir') . $templates[$documentType];
        $phpWord = IOFactory::load($templatePath);
        //существует ли файл
        if (!file_exists($templatePath)) {
            return new Response("Ошибка: шаблон не найден.");
        }
    // if (!$numberPassport4) {
       //     return new Response($numberPassport4);
       // }
       

        $templateProcessor = new TemplateProcessor($templatePath);
        
        $templateProcessor->setValue('{{name}}', $name);
        $templateProcessor->setValue('{{secondName}}', $secondName);
        $templateProcessor->setValue('{{thirdName}}', $thirdName);
        $templateProcessor->setValue('{{age}}', $age);
        $templateProcessor->setValue('{{numberPassport}}', $numberPassport);
        $templateProcessor->setValue('{{serialPassport}}', $serialPassport);
        $templateProcessor->setValue('{{passportIssuedBy}}', $passportIssuedBy);
        $templateProcessor->setValue('{{passportDate}}', $passportDate);
        $templateProcessor->setValue('{{address}}', $address);
        $templateProcessor->setValue('{{phone}}', $phone);
        $templateProcessor->setValue('{{email}}', $email);

        $templateProcessor->setValue('{{name2}}', $name2);
        $templateProcessor->setValue('{{secondName2}}', $secondName2);
        $templateProcessor->setValue('{{thirdName2}}', $thirdName2);
        $templateProcessor->setValue('{{age2}}', $age2);
        $templateProcessor->setValue('{{numberPassport2}}', $numberPassport2);
        $templateProcessor->setValue('{{serialPassport2}}', $serialPassport2);
        $templateProcessor->setValue('{{passportIssuedBy2}}', $passportIssuedBy2);
        $templateProcessor->setValue('{{passportDate2}}', $passportDate2);
        $templateProcessor->setValue('{{address2}}', $address2);
        $templateProcessor->setValue('{{phone2}}', $phone2);
        $templateProcessor->setValue('{{email2}}', $email2);

        $templateProcessor->setValue('{{name3}}', $name3); //без опекуна
$templateProcessor->setValue('{{secondName3}}', $secondName3);
$templateProcessor->setValue('{{thirdName3}}', $thirdName3);
$templateProcessor->setValue('{{numberPassport3}}', $numberPassport3);
$templateProcessor->setValue('{{serialPassport3}}', $serialPassport3);
$templateProcessor->setValue('{{passportIssuedBy3}}', $passportIssuedBy3);
$templateProcessor->setValue('{{passportDate3}}', $passportDate3);
$templateProcessor->setValue('{{address3}}', $address3);
$templateProcessor->setValue('{{phone3}}', $phone3);
$templateProcessor->setValue('{{email3}}', $email3);

        $templateProcessor->setValue('{{name4}}', $name4); //доп несоврешеннолетний свидетельство о рождении
$templateProcessor->setValue('{{secondName4}}', $secondName4);
$templateProcessor->setValue('{{thirdName4}}', $thirdName4);
$templateProcessor->setValue('{{name5}}', $name5);
$templateProcessor->setValue('{{secondName5}}', $secondName5);
$templateProcessor->setValue('{{thirdName5}}', $thirdName5);
$templateProcessor->setValue('{{bday}}', $bday);
$templateProcessor->setValue('{{blocation}}', $blocation);
$templateProcessor->setValue('{{serialSvid}}', $serialSvid);
$templateProcessor->setValue('{{numSvid}}', $numSvid);
$templateProcessor->setValue('{{svidIssuedBy}}', $svidIssuedBy);
$templateProcessor->setValue('{{svidDate}}', $svidDate);
$templateProcessor->setValue('{{address4}}', $address4);


$templateProcessor->setValue('{{name6}}', $name6); // Имя
$templateProcessor->setValue('{{secondName6}}', $secondName6); // Фамилия
$templateProcessor->setValue('{{thirdName6}}', $thirdName6); // Отчество
$templateProcessor->setValue('{{bday2}}', $bday2); // Дата рождения
$templateProcessor->setValue('{{numberPassport4}}', $numberPassport4); // Номер паспорта
$templateProcessor->setValue('{{serialPassport4}}', $serialPassport4); // Серия паспорта
$templateProcessor->setValue('{{passportIssuedBy4}}', $passportIssuedBy4); // Кем выдан
$templateProcessor->setValue('{{passportDate4}}', $passportDate4); // Когда выдан
$templateProcessor->setValue('{{codeDep}}', $codeDep); // Код подразделения
$templateProcessor->setValue('{{address5}}', $address5); // Адрес
$templateProcessor->setValue('{{phone4}}', $phone4); // Номер телефона
$templateProcessor->setValue('{{email4}}', $email4); // Email

$templateProcessor->setValue('{{name7}}', $name7);
$templateProcessor->setValue('{{secondName7}}', $secondName7);
$templateProcessor->setValue('{{thirdName7}}', $thirdName7);
$templateProcessor->setValue('{{name8}}', $name8);
$templateProcessor->setValue('{{secondName8}}', $secondName8);
$templateProcessor->setValue('{{thirdName8}}', $thirdName8);
$templateProcessor->setValue('{{bday3}}', $bday3);
$templateProcessor->setValue('{{serialSvid2}}', $serialSvid2);
$templateProcessor->setValue('{{numSvid2}}', $numSvid2);
$templateProcessor->setValue('{{svidIssuedBy2}}', $svidIssuedBy2);
$templateProcessor->setValue('{{svidDate2}}', $svidDate2);
$templateProcessor->setValue('{{address6}}', $address6);
$templateProcessor->setValue('{{schoolInfo}}', $schoolInfo);
$templateProcessor->setValue('{{phone5}}', $phone5);
$templateProcessor->setValue('{{phone6}}', $phone6);

$templateProcessor->setValue('{{name9}}', $name9);
$templateProcessor->setValue('{{secondName9}}', $secondName9);
$templateProcessor->setValue('{{thirdName9}}', $thirdName9);
$templateProcessor->setValue('{{name10}}', $name10);
$templateProcessor->setValue('{{secondName10}}', $secondName10);
$templateProcessor->setValue('{{thirdName10}}', $thirdName10);
$templateProcessor->setValue('{{bday4}}', $bday4);
$templateProcessor->setValue('{{numberPassport3}}', $numberPassport3);
$templateProcessor->setValue('{{serialPassport3}}', $serialPassport3);
$templateProcessor->setValue('{{passportIssuedBy3}}', $passportIssuedBy3);
$templateProcessor->setValue('{{passportDate3}}', $passportDate3);
$templateProcessor->setValue('{{schoolInfo2}}', $schoolInfo2);
$templateProcessor->setValue('{{phone7}}', $phone7);
$templateProcessor->setValue('{{phone8}}', $phone8);
$templateProcessor->setValue('{{address7}}', $address7);



    for ($i = 1; $i <= 23; $i++) {
    $templateProcessor->setValue("{{checkbox$i}}", $checkboxes['checkbox' . $i]);
}

for ($i = 24; $i <= 46; $i++) {
    $templateProcessor->setValue("{{checkbox$i}}", $checkboxes2['checkbox' . $i]);
}




 

     
        $tempFile = tempnam(sys_get_temp_dir(), 'word_') . '.docx';
        $templateProcessor->saveAs($tempFile);

      
        $response = new StreamedResponse(function () use ($tempFile) {
            readfile($tempFile);
            unlink($tempFile); 
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', 'attachment;filename="document.docx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
