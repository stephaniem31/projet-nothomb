<?php

namespace App\Controller;

use App\Entity\Short;
use App\Repository\ShortRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/short", name="short_")
 */
class ShortController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(shortRepository $shortRepository): Response
    {
        return $this->render('short/index.html.twig', [
            'shorts' => $shortRepository->findBy([], ['year' => 'ASC']),
        ]);
    }
    /**
     * @Route("/{id}/", requirements={"id"="\d+"}, methods={"GET"}, name="show")     
     */
    public function show(int $id, shortRepository $shortRepository)
    {
        return $this->render('short/show.html.twig', [
            'short' => $shortRepository->findOneBy(['id' => $id])
        ]);
    }
}
