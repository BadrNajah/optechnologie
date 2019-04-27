<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Avance;
use AppBundle\Form\AvanceType;


class AvanceController extends Controller
{


    /**
     * @Route("/avance/historiqueavance/{id}" , name = "historiqueavance")
     */
    public function historique_avanceAction($id,Request $request)
    {
            


        $avance = $this->getDoctrine()->getRepository('AppBundle:Avance')->avance_by_client($id);
        return $this->render('AppBundle:Avance:historyavance.html.twig', array(
            'avance' => $avance , 
        ));

    }

    /**
     * @Route("/directory/addavance/{id}/{idir}" , name = "addavance")
     */
    public function addavanceAction($id , $idir , Request $request)
    {
        $avance = new Avance();

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Mont');
        
        $mont = $repository->find($id);

        $form = $this->createForm(AvanceType::class, $avance);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $stringdate = $avance->getDateAvance();
            $dateUS = \DateTime::createFromFormat("d/m/Y", $stringdate)->format("Y-m-d");
            $avance->setDateAvance($dateUS);
            $avance->setMont($mont);
            $em = $this->getDoctrine()->getManager();
            $em->persist($avance);
            $em->flush();
            return $this->redirectToRoute('directoryclient',array('id' => $idir));
        }
        
        return $this->render('AppBundle:Avance:addavance.html.twig', array(
            'form' => $form->createView()
        ));
    }

        /**
     * @Route("/directory/addavancelentile/{id}/{idir}" , name = "addavance_lentile")
     */
    public function addavancelentileAction($id , $idir , Request $request)
    {
        $avance = new Avance();

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Lentile');
        
        $lent = $repository->find($id);

        $form = $this->createForm(AvanceType::class, $avance);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $stringdate = $avance->getDateAvance();
            $dateUS = \DateTime::createFromFormat("d/m/Y", $stringdate)->format("Y-m-d");
            $avance->setDateAvance($dateUS);
            $avance->setLent($lent);
            //$total_price = $this->getDoctrine()->getRepository('AppBundle:Mont')->CountTotalPriceOfClient($id);
            //$avanceclient = $avance->getAvance();
            //$rest = (int)$total_price[0]['total'] - (int)$avanceclient;

            $em = $this->getDoctrine()->getManager();
            $em->persist($avance);
            $em->flush();
            return $this->redirectToRoute('directoryclient',array('id' => $idir));
        }
        
        return $this->render('AppBundle:Avance:addavance.html.twig', array(
            'form' => $form->createView()
        ));
    }



    


}
