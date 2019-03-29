<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Vol;
use Myapp\GestionProjetBundle\Form\VolType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


/**
 * Bateaux controller.
 *
 */
class VolController extends Controller
{
    /**
     * Lists all bateaux entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $vols = $em->getRepository('GestionProjetBundle:Vol')->findAll();

        return $this->render('vol/index.html.twig', array(
            'vols' => $vols,
        ));
    }

    /**
     * Creates a new bateaux entity.
     *
     */
    public function newAction(Request $request)
    {
        $vol = new Vol();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\VolType', $vol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vol);
            $em->flush();

            return $this->redirectToRoute('vol_new', array('id' => $vol->getId()));
        }

        return $this->render('vol/new.html.twig', array(
            'vol' => $vol,
            'form' => $form->createView(),
        ));
    }
    
         public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $vols = $em->getRepository('GestionProjetBundle:Vol')->findAll();

        return $this->render('vol/modifier.html.twig', array(
                    'vols' => $vols,
        ));
    }
    

    /**
     * Finds and displays a bateaux entity.
     *
     */
    public function showAction(vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);

        return $this->render('vol/show.html.twig', array(
            'vol' => $vol,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bateaux entity.
     *
     */
    public function editAction(Request $request, Vol $vol)
    {
        $deleteForm = $this->createDeleteForm($vol);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\VolType', $vol);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
           $em = $this->getDoctrine()->getManager();
            
            $em->persist($vol);
         
            $em->flush();

            return $this->redirectToRoute('vol_edit', array('id' => $vol->getId()));
        }

        return $this->render('vol/edit.html.twig', array(
            'vol' => $vol,
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
        $vol = $cox->getRepository("GestionProjetBundle:Vol")->findOneById($id);
        
        if (!$vol) {
        throw $this->createNotFoundException('No Vol found for id '.$id);
    }
        
        
        $cox->remove($vol);
        $cox->flush();
        return $this->redirect($this->generateUrl("vol_new"));
        
     
    }
    
    

    /**
     * Creates a form to delete a bateaux entity.
     *
     * @param Bateaux $bateaux The bateaux entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vol $vol)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vol_delete', array('id' => $vol->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
