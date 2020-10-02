<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Entity\Avenant;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/projet")
 */
class ProjetController extends AbstractController
{
    /**
     * @Route("/", name="projet_index", methods={"GET"})
     */
    public function index(ProjetRepository $projetRepository): Response
    {
        return $this->render('projet/index.html.twig', [
            'projets' => $projetRepository->findAll(),
        ]);
    }
    /**
     * @Route("/new", name="projet_new", methods={"GET","POST"})
     */
    public function indexAction(Request $request)
    {
 
 
        $projet = new Projet();
 
 
        $avenant = new Avenant();
 
        $form1 = $this->createFormBuilder($projet)
            ->add('IntituleMarche')
            ->add('Domaine')
            ->add('Montant')
            ->add('contrat')

            ->getForm();
 
 
 
        $form2 = $this->createFormBuilder($avenant)
            ->add('MtHTVA')
            ->add('MtTVA')
            ->add('MtTTC')
            ->add('projet_id')
            

            ->getForm();
 
 
        if ($request->getMethod() == 'POST') {
            $form1->handleRequest($request);
            if ($form1->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($avenant);
                $em->flush();
                return $this->redirect($this->generateUrl('projet_index'));
            }
        }
 
 
       if ($request->getMethod() == 'POST') {
            $form2->handleRequest($request);
            if ($form2->isValid() ) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($projet);
                $em->flush();
                return $this->redirect($this->generateUrl('projet_index'));
 
            }
       }
 
        return $this->render('projet/new.html.twig',[
            'form' => $form1->createView(),
            'form2' => $form2 ->createView()
 
        ]);
            
    }

    
  

    /**
     * @Route("/{id}", name="projet_show", methods={"GET"})
     */
    public function show(Projet $projet): Response
    {
        return $this->render('projet/show.html.twig', [
            'projet' => $projet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="projet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Projet $projet): Response
    {
        $form = $this->createForm(ProjetType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projet_index');
        }

        return $this->render('projet/edit.html.twig', [
            'projet' => $projet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Projet $projet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('projet_index');
    }
}
