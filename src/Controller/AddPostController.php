<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostAddType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AddPostController extends AbstractController
{
    /**
     * @Route("/add", name="add_post")
     */
    public function index(Request $request)
    {
        $addRequest = new  Post();
        $form = $this->createForm(PostAddType::class, $addRequest);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager(); // Получаем EntityManager для сохранения данных
            $manager->persist($addRequest); // получаем новую сущность для сохранения в БД
            $manager->flush();  // "Сливаем" изменения в бд
            $this->addFlash('info', 'Спасибо за новый пост');
            return $this->redirectToRoute('add_post');
        }

            return $this->render('add_post/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
