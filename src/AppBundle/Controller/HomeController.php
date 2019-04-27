<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Clients;
use AppBundle\Entity\Avance;
use AppBundle\Entity\Mont;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    /**
     * @Route("/" , name = "home")
     */
    public function home(Request $request)
    {

        $nbrClients = $this->getDoctrine()->getRepository('AppBundle:Clients')->nbrClients();
        $sumAvance = $this->getDoctrine()->getRepository('AppBundle:Avance')->sumAvance();
        $sumTotal = $this->getDoctrine()->getRepository('AppBundle:Mont')->sumTotal();
        $sumRest = $sumTotal[0]['total'] - $sumAvance[0]['total_avance'];
        
        return $this->render('AppBundle:Home:home.html.twig', array(
            'nbrclients' => $nbrClients[0]['nbrclients'] , 'sumAvance' => $sumAvance[0]['total_avance'] , 
            'sumRest' => $sumRest , 'sumTotal' => $sumTotal[0]['total']));
    }
}