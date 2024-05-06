<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $articles = [];

    /**
     * @Route("/article/create", name="create_article", methods={"GET", "POST"})
     */
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Обработка отправки формы
            $title = $request->request->get('title');
            $content = $request->request->get('content');
            $image = $request->files->get('image');

            // Сохранение данных в массиве
            $this->articles[] = [
                'title' => $title,
                'content' => $content,
                'image' => $image,
            ];

            // Возвращаем ответ или редирект
            return $this->redirectToRoute('main');
        }

        return $this->render('article/create.html.twig', [
            'articles' => $this->articles,
        ]);
    }
}