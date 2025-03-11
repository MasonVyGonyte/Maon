<?php

namespace App\Controller;

use PhpOffice\PhpWord\PhpWord;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class WordFileController extends AbstractController
{
    #[Route('/download-word', name: 'generate_word')]
    public function generateWord()
    {
        // Создаём новый объект PHPWord
        $phpWord = new PHPWord();
        
        // Добавляем раздел в документ
        $section = $phpWord->addSection();
        $section->addText('Привет, это мой Word-документ!');
        
        // Сохраняем документ во временный файл
        $tempFile = tempnam(sys_get_temp_dir(), 'word_') . '.docx';
        $phpWord->save($tempFile);

        // Отправляем документ пользователю
        $response = new StreamedResponse(function () use ($tempFile) {
            readfile($tempFile);
            unlink($tempFile); // Удаляем временный файл после передачи
        });

        // Устанавливаем заголовки для скачивания
        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $response->headers->set('Content-Disposition', 'attachment;filename="document.docx"');
        $response->headers->set('Cache-Control', 'max-age=0');

        return $response;
    }
}
