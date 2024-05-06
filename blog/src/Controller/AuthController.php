<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/login", name="login", methods={"GET"})
     */
    public function login(): Response
    {
        return $this->render('auth/login.html.twig');
    }

    /**
     * @Route("/login", name="process_login", methods={"POST"})
     */
    public function processLogin(Request $request): Response
    {
        // Обработка отправки формы авторизации
        
        // Возвращаем ответ
        return new Response('Авторизация в процессе...');
    }
}
?>