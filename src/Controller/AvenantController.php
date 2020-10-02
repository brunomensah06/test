<?php

namespace App\Controller;

use App\Entity\Avenant;
use App\Form\AvenantType;
use App\Repository\AvenantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/avenant")
 */
class AvenantController extends AbstractController
{
    /**
     * @Route("/", name="avenant_index", methods={"GET"})
     */
    public function index(AvenantRepository $avenantRepository): Response
    {
        return $this->render('avenant/index.html.twig', [
            'avenants' => $avenantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="avenant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $avenant = new Avenant();
        $form = $this->createForm(AvenantType::class, $avenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avenant);
            $entityManager->flush();

            return $this->redirectToRoute('avenant_index');
        }

        return $this->render('avenant/new.html.twig', [
            'avenant' => $avenant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avenant_show", methods={"GET"})
     */
    public function show(Avenant $avenant): Response
    {
        return $this->render('avenant/show.html.twig', [
            'avenant' => $avenant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="avenant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Avenant $avenant): Response
    {
        $form = $this->createForm(AvenantType::class, $avenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('avenant_index');
        }

        return $this->render('avenant/edit.html.twig', [
            'avenant' => $avenant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="avenant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Avenant $avenant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avenant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($avenant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avenant_index');
    }
}
