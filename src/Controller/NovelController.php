<?php

namespace App\Controller;

use App\Entity\Novel;
use App\Form\NovelType;
use App\Repository\NovelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
            'novels' => $novelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/update", name="update")
     */
    public function indexAdmin(NovelRepository $novelRepository): Response
    {
        return $this->render('novel/index2.html.twig', [
            'novels' => $novelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", methods={"GET", "POST"}, name="new")     
     */
    public function new(Request $request): Response
    {
        $novel = new Novel();
        $form = $this->createForm(NovelType::class, $novel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($novel);
            $entityManager->flush();

            return $this->redirectToRoute('novel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('novel/new.html.twig', [
            'novel' => $novel,
            'form' => $form,
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

    /**
     * @Route("/{id}/edit", methods={"GET", "POST"}, name="edit")     
     */
    public function edit(Request $request, Novel $novel): Response
    {
        $form = $this->createForm(NovelType::class, $novel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('novel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('novel/edit.html.twig', [
            'novel' => $novel,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", methods={"POST"}, name="delete")     
     */
    public function delete(Request $request, Novel $novel): Response
    {
        if ($this->isCsrfTokenValid('delete' . $novel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($novel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('novel_index', [], Response::HTTP_SEE_OTHER);
    }
}
