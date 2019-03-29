<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Civilite;
use Myapp\GestionProjetBundle\Form\CiviliteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * Civilite controller.
 *
 */
class CiviliteController extends Controller
{
    /**
     * Lists all civilite entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $civilites = $em->getRepository('GestionProjetBundle:Civilite')->findAll();

        return $this->render('civilite/index.html.twig', array(
            'civilites' => $civilites,
        ));
    }
    
     public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $civilites = $em->getRepository('GestionProjetBundle:Civilite')->findAll();

        return $this->render('civilite/modifier.html.twig', array(
                     'civilites' => $civilites,
        ));
    }
    

    /**
     * Creates a new civilite entity.
     *
     */
    public function newAction(Request $request)
    {
        $civilite = new Civilite();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\CiviliteType', $civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($civilite);
            $em->flush();

            return $this->redirectToRoute('civilite_show', array('id' => $civilite->getId()));
        }

        return $this->render('civilite/new.html.twig', array(
            'civilite' => $civilite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a civilite entity.
     *
     */
    public function showAction(Civilite $civilite)
    {
        $deleteForm = $this->createDeleteForm($civilite);

        return $this->render('civilite/show.html.twig', array(
            'civilite' => $civilite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing civilite entity.
     *
     */
    public function editAction(Request $request, Civilite $civilite)
    {
        $deleteForm = $this->createDeleteForm($civilite);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\CiviliteType', $civilite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager();
             $em->persist($civilite);
         
             $em->flush();

            return $this->redirectToRoute('civilite_edit', array('id' => $civilite->getId()));
        }

        return $this->render('civilite/edit.html.twig', array(
            'civilite' => $civilite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

   
    /**
     * Deletes a devi entity.
     *
     */
    public function deleteAction(Request $request, Civilite $civilite)
    {
        $form = $this->createDeleteForm($civilite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($civilite);
            $em->flush();
        }

        return $this->redirectToRoute('civilite_index');
    }
    
   

    

    /**
     * Creates a form to delete a civilite entity.
     *
     * @param Civilite $civilite The civilite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Civilite $civilite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('civilite_delete', array('id' => $civilite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
