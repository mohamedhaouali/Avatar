<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Bateaux;
use Myapp\GestionProjetBundle\Form\BateauxType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * Bateaux controller.
 *
 */
class BateauxController extends Controller
{
    /**
     * Lists all bateaux entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $bateauxes = $em->getRepository('GestionProjetBundle:Bateaux')->findAll();

        return $this->render('bateaux/index.html.twig', array(
            'bateauxes' => $bateauxes,
        ));
    }

    /**
     * Creates a new bateaux entity.
     *
     */
    public function newAction(Request $request)
    {
        $bateaux = new Bateaux();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\BateauxType', $bateaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bateaux);
            $em->flush();

            return $this->redirectToRoute('bateaux_new', array('id' => $bateaux->getId()));
        }

        return $this->render('bateaux/new.html.twig', array(
            'bateaux' => $bateaux,
            'form' => $form->createView(),
        ));
    }
    
         public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $bateauxes = $em->getRepository('GestionProjetBundle:Bateaux')->findAll();

        return $this->render('bateaux/modifier.html.twig', array(
                    'bateauxes' => $bateauxes,
        ));
    }
    

    /**
     * Finds and displays a bateaux entity.
     *
     */
    public function showAction(Bateaux $bateaux)
    {
        $deleteForm = $this->createDeleteForm($bateaux);

        return $this->render('bateaux/show.html.twig', array(
            'bateaux' => $bateaux,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bateaux entity.
     *
     */
    public function editAction(Request $request, Bateaux $bateaux)
    {
        $deleteForm = $this->createDeleteForm($bateaux);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\BateauxType', $bateaux);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
           $em = $this->getDoctrine()->getManager();
            
            $em->persist($bateaux);
         
            $em->flush();

            return $this->redirectToRoute('bateaux_edit', array('id' => $bateaux->getId()));
        }

        return $this->render('bateaux/edit.html.twig', array(
            'bateaux' => $bateaux,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    
    /**
     * Deletes a article entity.
     *
     */
        public function deleteAction($id)
    {
        
        $cox = $this->getDoctrine()->getManager();
        $bateaux = $cox->getRepository("GestionProjetBundle:Bateaux")->findOneById($id);
        
        if (!$bateaux) {
        throw $this->createNotFoundException('No Bateaux found for id '.$id);
    }
        
        
        $cox->remove($bateaux);
        $cox->flush();
        return $this->redirect($this->generateUrl("bateaux_new"));
        
     
    }
    
    

    /**
     * Creates a form to delete a bateaux entity.
     *
     * @param Bateaux $bateaux The bateaux entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bateaux $bateaux)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bateaux_delete', array('id' => $bateaux->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
