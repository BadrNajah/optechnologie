<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login" , name = "login")
     */
    public function loginAction()
    {
        return $this->render('AppBundle:Security:login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/logout" , name = "logout")
     */
    public function logoutAction()
    {
        throw new \RuntimeException("this should never be called directly"); 
    }

}
