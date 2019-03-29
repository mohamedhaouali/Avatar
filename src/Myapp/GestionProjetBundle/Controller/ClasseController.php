<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Classe;
use Myapp\GestionProjetBundle\Form\ClasseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



/**
 * Classe controller.
 *
 */
class ClasseController extends Controller
{
    /**
     * Lists all classe entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $classes = $em->getRepository('GestionProjetBundle:Classe')->findAll();

        return $this->render('classe/index.html.twig', array(
            'classes' => $classes,
        ));
    }

   public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $classes = $em->getRepository('GestionProjetBundle:Classe')->findAll();

        return $this->render('classe/modifier.html.twig', array(
                     'classes' => $classes,
        ));
    } 
    
    
    /**
     * Creates a new classe entity.
     *
     */
    public function newAction(Request $request)
    {
        $classe = new Classe();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\ClasseType', $classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classe);
            $em->flush();

            return $this->redirectToRoute('classe_show', array('id' => $classe->getId()));
        }

        return $this->render('classe/new.html.twig', array(
            'classe' => $classe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a classe entity.
     *
     */
    public function showAction(Classe $classe)
    {
        $deleteForm = $this->createDeleteForm($classe);

        return $this->render('classe/show.html.twig', array(
            'classe' => $classe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing classe entity.
     *
     */
    public function editAction(Request $request, Classe $classe)
    {
        $deleteForm = $this->createDeleteForm($classe);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\ClasseType', $classe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('classe_edit', array('id' => $classe->getId()));
        }

        return $this->render('classe/edit.html.twig', array(
            'classe' => $classe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

       public function deleteAction(Request $request, Classe $classe)
    {
        $form = $this->createDeleteForm($classe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($classe);
            $em->flush();
        }

        return $this->redirectToRoute('classe_index');
    }
    
    
    

    /**
     * Creates a form to delete a classe entity.
     *
     * @param Classe $classe The classe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Classe $classe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classe_delete', array('id' => $classe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
