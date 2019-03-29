<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Voyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Voyage controller.
 *
 */
class VoyageController extends Controller
{
    /**
     * Lists all voyage entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $voyages = $em->getRepository('GestionProjetBundle:Voyage')->findAll();

        return $this->render('voyage/index.html.twig', array(
            'voyages' => $voyages
        ));
    }

    /**
     * Creates a new voyage entity.
     *
     */
    public function newAction(Request $request)
    {
        $voyage = new Voyage();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\VoyageType', $voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $voyage->upload();
            $em->persist($voyage);
            $em->flush();

            return $this->redirectToRoute('voyage_show', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/new.html.twig', array(
            'voyage' => $voyage,
            'form' => $form->createView(),
        ));
    }
    
    
            public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $voyages = $em->getRepository('GestionProjetBundle:Voyage')->findAll();

        return $this->render('voyage/modifier.html.twig', array(
                    'voyages' => $voyages,
        ));
    }

    /**
     * Finds and displays a voyage entity.
     *
     */
    public function showAction(Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);

        return $this->render('voyage/show.html.twig', array(
            'voyage' => $voyage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing voyage entity.
     *
     */
    public function editAction(Request $request, Voyage $voyage)
    {
        $deleteForm = $this->createDeleteForm($voyage);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\VoyageType', $voyage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em =$this->getDoctrine()->getManager();
            
            $em->persist($voyage);
            
            $voyage->upload();
         
            $em->flush();

            return $this->redirectToRoute('voyage_edit', array('id' => $voyage->getId()));
        }

        return $this->render('voyage/edit.html.twig', array(
            'voyage' => $voyage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a voyage entity.
     *
     */
    public function deleteAction(Request $request, Voyage $voyage)
    {
        $form = $this->createDeleteForm($voyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($voyage);
            $em->flush();
        }

        return $this->redirectToRoute('voyage_index');
    }

    /**
     * Creates a form to delete a voyage entity.
     *
     * @param Voyage $voyage The voyage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voyage $voyage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voyage_delete', array('id' => $voyage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
 
    
    
    public function rechercheAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $voyages = $em->getRepository("GestionProjetBundle:Voyage")->findAll(); // afficher tous les modeles
        if ($request->isMethod('POST'))
            ; {
            $titre = $request->get('titre');
            $voyages = $em->getRepository("GestionProjetBundle:Voyage")->findVoyagesBytitre($titre); // afficher par titre
        }
        return $this->render('voyage/rechercheVoyage.html.twig', array(
                    'voyages' => $voyages,
        ));
    }

}
