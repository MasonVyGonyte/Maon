<?php

namespace App\Controller;

use PhpOffice\PhpWord\PhpWord;

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

        $name2 = $session->get('name2');
        $secondName2 = $session->get('secondName2');
        $thirdName2 = $session->get('thirdName2');
        $age2 = $session->get('age2');
        $numberPassport2 = $session->get('numberPassport2');
        $serialPassport2 = $session->get('serialPassport2');
        $passportIssuedBy2 = $session->get('passportIssuedBy2');
        $passportDate2 = $session->get('passportDate2');
        $address2 = $session->get('address2');

        $templates = [
            'doc1' => '/public/templates/d1.docx',
            'doc2' => '/public/templates/d2.docx',
            'doc3' => '/public/templates/d3.docx',
            'doc4' => '/public/templates/d4.docx',
        ];
       
        
        $templatePath = $this->getParameter('kernel.project_dir') . $templates[$documentType];

        //существует ли файл
        if (!file_exists($templatePath)) {
            return new Response("Ошибка: шаблон не найден.");
        }
        if ($documentType) {
            return new Response($documentType);
        }
       
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

        $templateProcessor->setValue('{{name2}}', $name2);
        $templateProcessor->setValue('{{secondName2}}', $secondName2);
        $templateProcessor->setValue('{{thirdName2}}', $thirdName2);
        $templateProcessor->setValue('{{age2}}', $age2);
        $templateProcessor->setValue('{{numberPassport2}}', $numberPassport2);
        $templateProcessor->setValue('{{serialPassport2}}', $serialPassport2);
        $templateProcessor->setValue('{{passportIssuedBy2}}', $passportIssuedBy2);
        $templateProcessor->setValue('{{passportDate2}}', $passportDate2);
        $templateProcessor->setValue('{{address2}}', $address2);


     
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
