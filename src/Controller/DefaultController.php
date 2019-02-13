<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(PostRepository $postRepository)
    {

        $viewPosts = $postRepository->findAll();

        return $this->render('default/index.html.twig', [
            'viewPosts' => $viewPosts,
        ]);
    }
}
