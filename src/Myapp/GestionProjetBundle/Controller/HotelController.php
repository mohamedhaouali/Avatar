<?php

namespace Myapp\GestionProjetBundle\Controller;

use Myapp\GestionProjetBundle\Entity\Hotel;
use Myapp\GestionProjetBundle\Form\HotelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Hotel controller.
 *
 */
class HotelController extends Controller
{
    /**
     * Lists all hotel entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $hotels = $em->getRepository('GestionProjetBundle:Hotel')->findAll();
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $hotels, $request->query->get('page', 1)/* page number */, 5/* limit per page */
        );
        

        return $this->render('hotel/index.html.twig', array(
            'hotels' => $hotels, 'hotels' => $pagination
        ));
    }

    /**
     * Creates a new hotel entity.
     *
     */
    public function newAction(Request $request)
    {
        $hotel = new Hotel();
        $form = $this->createForm('Myapp\GestionProjetBundle\Form\HotelType', $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $hotel->upload();
            $em->persist($hotel);
            $em->flush();

            return $this->redirectToRoute('hotel_new', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/new.html.twig', array(
            'hotel' => $hotel,
            'form' => $form->createView(),
        ));
    }
    
     public function modifierAction() {
        $em = $this->getDoctrine()->getManager();

        $hotels = $em->getRepository('GestionProjetBundle:Hotel')->findAll();

        return $this->render('hotel/modifier.html.twig', array(
                    'hotels' => $hotels,
        ));
    } 
    

    /**
     * Finds and displays a hotel entity.
     *
     */
    public function showAction(Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);

        return $this->render('hotel/show.html.twig', array(
            'hotel' => $hotel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hotel entity.
     *
     */
    public function editAction(Request $request, Hotel $hotel)
    {
        $deleteForm = $this->createDeleteForm($hotel);
        $editForm = $this->createForm('Myapp\GestionProjetBundle\Form\HotelType', $hotel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em =$this->getDoctrine()->getManager();
            $hotel->upload();
            $em->flush();
            
           

            return $this->redirectToRoute('hotel_edit', array('id' => $hotel->getId()));
        }

        return $this->render('hotel/edit.html.twig', array(
            'hotel' => $hotel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

   

     public function deleteAction($id)
    {
        
        $cox = $this->getDoctrine()->getManager();
        $hotel = $cox->getRepository("GestionProjetBundle:Hotel")->findOneById($id);
        
        if (!$hotel) {
        throw $this->createNotFoundException('No Hotel found for id '.$id);
    }
        
        
        $cox->remove($hotel);
        $cox->flush();
        return $this->redirect($this->generateUrl("hotel_new"));
        
     
    }
    
    
    
    /**
     * Creates a form to delete a hotel entity.
     *
     * @param Hotel $hotel The hotel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Hotel $hotel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hotel_delete', array('id' => $hotel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    public function rechercheAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository("GestionProjetBundle:Hotel")->findAll(); // afficher tous les modeles
        if ($request->isMethod('POST'))
            ; {
            $titre = $request->get('titre');
            $hotels = $em->getRepository("GestionProjetBundle:Hotel")->findHotelsBytitre($titre); // afficher par titre
        }
        return $this->render('hotel/rechercheHotel.html.twig', array(
                    'hotels' => $hotels,
        ));
    }

}
