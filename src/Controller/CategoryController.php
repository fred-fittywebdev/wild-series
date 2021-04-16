<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categories", name="category_")
 */

class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $category
        ]);
    }

    /**
     * @Route("/{name}", name="show")
     */

    public function show(string $name): Response
    {
        if (!$name) {
            throw $this->createNotFoundException(
                'No category found'
            );
        } else {
            $categoryName = $this->getDoctrine()
                ->getRepository(Category::class)
                ->findOneBy(['name' => $name]);

            $categoryProgram = $this->getDoctrine()
                ->getRepository(Program::class)
                ->findBy(['category' => $categoryName->getId()], ['id' => 'DESC'], 3);
        }
        return $this->render(
            'category/show.html.twig',
            [
                'categories' => $categoryProgram,
                'category_name' => $categoryName
            ]
        );
    }
}