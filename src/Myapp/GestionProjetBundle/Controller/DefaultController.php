<?php

namespace Myapp\GestionProjetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



use Myapp\GestionProjetBundle\Entity\Contact;
use Myapp\GestionProjetBundle\Form\ContactType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionProjetBundle:Default:index.html.twig');
    }
    
    
      public function acceuilAction()
    {
        return $this->render('GestionProjetBundle:Default:acceuil.html.twig');
    }
    
     public function belgradeAction()
    {
        return $this->render('GestionProjetBundle:Destination:belgrade.html.twig');
    }
    
      public function casaAction()
    {
        return $this->render('GestionProjetBundle:Destination:casa.html.twig');
    }
    
      public function pragueAction()
    {
        return $this->render('GestionProjetBundle:Destination:prague.html.twig');
    }
    
      public function barceloneAction()
    {
        return $this->render('GestionProjetBundle:Destination:barcelone.html.twig');
    }
    
       public function beyrouthAction()
    {
        return $this->render('GestionProjetBundle:Destination:beyrouth.html.twig');
    }
    
        public function portugalAction()
    {
        return $this->render('GestionProjetBundle:Destination:portugal.html.twig');
    }
    
          public function niceAction()
    {
        return $this->render('GestionProjetBundle:Destination:nice.html.twig');
    }
    
             public function indeAction()
    {
        return $this->render('GestionProjetBundle:Destination:inde.html.twig');
    }
    
               public function romeAction()
    {
        return $this->render('GestionProjetBundle:Destination:rome.html.twig');
    }
    
               public function parisAction()
    {
        return $this->render('GestionProjetBundle:Destination:paris.html.twig');
    }
    
                 public function bruxelleAction()
    {
        return $this->render('GestionProjetBundle:Destination:bruxelle.html.twig');
    }
 
    
                   public function madridAction()
    {
        return $this->render('GestionProjetBundle:Destination:madrid.html.twig');
    }
    
                     public function omra1Action()
    {
        return $this->render('GestionProjetBundle:Omra:omra1.html.twig');
    }
    
    
                       public function omra2Action()
    {
        return $this->render('GestionProjetBundle:Omra:omra2.html.twig');
    }
    
                          public function omra3Action()
    {
        return $this->render('GestionProjetBundle:Omra:omra3.html.twig');
    }
    
     public function galerieAction()
    {
        return $this->render('GestionProjetBundle:Default:galerie.html.twig');
    }
    
       public function volAction()
    {
        return $this->render('GestionProjetBundle:Default:vol.html.twig');
    }
    
           public function hotelAction()
    {
        return $this->render('GestionProjetBundle:Template Hotel:hotel.html.twig');
    }
    
            public function detailAction()
    {
        return $this->render('GestionProjetBundle:Template Hotel:detail.html.twig');
    }
    
            public function detailHotelAction()
    {
        return $this->render('GestionProjetBundle:Template Hotel:detailHotel.html.twig');
    }    
    
    
    
  public function contactAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            $subject = $form->get('objet')->getData();
            $email = $form->get('email')->getData();
            $message = $form->get('sujet')->getData();
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($contact);
                $em->flush();
                $mess = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom($this->getParameter('mailer_user'))
                    ->setTo('microsystemeinformations@gmail.com')
                    ->setReplyTo($email)
                    ->setBody($message);
                $this->get('mailer')->send($mess);
                return $this->redirect($this->generateUrl('contact'));
            }
        }
        return $this->render('GestionProjetBundle:Default:contact.html.twig', array('form' => $form->createView()));
    }       
    
   
  
               public function sejourAction()
    {
        return $this->render('GestionProjetBundle:Sejour:sejour.html.twig');
    }  
    
                  public function registerAction()
    {
        return $this->render('GestionProjetBundle:Register:register.html.twig');
    } 
    
  
}
