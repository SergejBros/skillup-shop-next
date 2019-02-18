<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostAddType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EditPostController extends AbstractController
{
    /**
     * @Route("/edit/{id}", name="edit_post")
     * @param Request $request
     */
    public function editPost(Post $post, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(PostAddType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('view_post', ['id' => $post->getId()]);
        }

        return $this->render('edit_post/index.html.twig', [
            'form' => $form->createView(),
            'post' => $post,
        ]);
    }
}
