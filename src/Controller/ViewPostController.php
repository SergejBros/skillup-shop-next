<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewPostController extends AbstractController
{
    /**
     * @Route("/viewpost/{id}", name="view_post")
     */
    public function index($id, PostRepository $postRepository)
    {
        $viewPost = $postRepository->find($id);

        return $this->render('view_post/index.html.twig', [
            'viewPost' => $viewPost,
        ]);
    }
}
