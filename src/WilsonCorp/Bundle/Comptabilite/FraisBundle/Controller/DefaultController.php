<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WilsonCorpComptabiliteFraisBundle:Default:index.html.twig');
    }
}
