<?php

namespace App\Controller;

use App\Repository\NovelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/novel", name="novel_")
 */
class NovelController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(NovelRepository $novelRepository): Response
    {
        return $this->render('novel/index.html.twig', [
            'novels' => $novelRepository->findAll()
        ]);
    }

    /**
     * @Route("/{id}/", requirements={"id"="\d+"}, methods={"GET"}, name="show")     
     */
    public function show(int $id, NovelRepository $novelRepository)
    {
        return $this->render('novel/show.html.twig', [
            'novel' => $novelRepository->findOneBy(['id' => $id])
        ]);
    }
}
