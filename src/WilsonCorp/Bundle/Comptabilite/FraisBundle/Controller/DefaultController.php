<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $userId = '6';

        return $this->render('WilsonCorpComptabiliteFraisBundle:Default:index.html.twig',array(
            'userId' => $userId
        ));
    }
}
