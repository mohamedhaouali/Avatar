<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Chambre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Myapp\GestionProjetBundle\Form\ChambreType;


/**
 * Chambre controller.
 *
 */
class ChambreController extends Controller
{
    /**
     * Lists all chambre entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $chambres = $em->getRepository('GestionProjetBundle:Chambre')->findAll();

        return $this->render('chambre/index.html.twig', array(
            'chambres' => $chambres,
        ));
    }

    /**
     * Creates a new chambre entity.
     *
     */
    public function newAction(Request $request)
    {
        $chambre = new Chambre();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\ChambreType', $chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chambre);
            $em->flush();

            return $this->redirectToRoute('chambre_new', array('id' => $chambre->getId()));
        }

        return $this->render('chambre/new.html.twig', array(
            'chambre' => $chambre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a chambre entity.
     *
     */
    public function showAction(Chambre $chambre)
    {
        $deleteForm = $this->createDeleteForm($chambre);

        return $this->render('chambre/show.html.twig', array(
            'chambre' => $chambre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing chambre entity.
     *
     */
    public function editAction(Request $request, Chambre $chambre)
    {
        $deleteForm = $this->createDeleteForm($chambre);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\ChambreType', $chambre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager();
             $em->flush();

            return $this->redirectToRoute('chambre_edit', array('id' => $chambre->getId()));
        }

        return $this->render('chambre/edit.html.twig', array(
            'chambre' => $chambre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a chambre entity.
     *
     */
    public function deleteAction(Request $request, Chambre $chambre)
    {
        $form = $this->createDeleteForm($chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chambre);
            $em->flush();
        }

        return $this->redirectToRoute('chambre_index');
    }

    /**
     * Creates a form to delete a chambre entity.
     *
     * @param Chambre $chambre The chambre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Chambre $chambre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chambre_delete', array('id' => $chambre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
       public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $chambres = $em->getRepository('GestionProjetBundle:Chambre')->findAll();

        return $this->render('chambre/modifier.html.twig', array(
                    'chambres' => $chambres,
        ));
    }
}
