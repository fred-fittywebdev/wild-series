<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/programs", name="program_")
 */
class ProgramController extends AbstractController
{


    /**
     * @Route("/show/{id<\d+>}", methods={"GET"}, name="show")
     */
    public function show(int $id = 1)
    {
        return $this->render('program/show.html.twig', ['id' => $id]);
    }

    /**
     * @Route("/", name="index")
     */


    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'wild séries',
        ]);
    }
}