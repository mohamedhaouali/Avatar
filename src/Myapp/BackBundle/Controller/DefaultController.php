<?php

namespace Myapp\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BackBundle:Default:index.html.twig');
    }
    
         public function layoutadminAction()
    {
        return $this->render('BackBundle::layoutadmin.html.twig');
    }
}
