<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditPostController extends AbstractController
{
    /**
     * @Route("/edit/post", name="edit_post")
     */
    public function index()
    {
        return $this->render('edit_post/index.html.twig', [
            'controller_name' => 'EditPostController',
        ]);
    }
}
