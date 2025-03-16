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
        $name = $session->get('name');
        $secondName = $session->get('secondName');
        $thirdName = $session->get('thirdName');
        $age = $session->get('age');
        $numberPassport = $session->get('numberPassport');
$serialPassport = $session->get('serialPassport');
$passportIssuedBy = $session->get('passportIssuedBy');
$passportDate = $session->get('passportDate');
$address = $session->get('address');
     
       
        $templatePath = $this->getParameter('kernel.project_dir') . '/public/templates/M1.docx';

        //существует ли файл
        if (!file_exists($templatePath)) {
            return new Response("Ошибка: шаблон не найден.");
        }
        if (!$name) {
            return new Response("тен тейма");
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
