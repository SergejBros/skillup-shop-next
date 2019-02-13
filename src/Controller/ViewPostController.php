<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ViewPostController extends AbstractController
{
    /**
     * @Route("/viewpost/{id}", name="view_post")
     */
    public function index()
    {
        return $this->render('view_post/index.html.twig', [
            'controller_name' => 'ViewPostController',
        ]);
    }
}
