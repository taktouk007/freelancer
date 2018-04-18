<?php

namespace App\FreelancerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppFreelancerBundle:Default:index.html.twig');
    }
}
