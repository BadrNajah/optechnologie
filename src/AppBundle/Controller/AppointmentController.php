<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Appointment;
use AppBundle\Entity\Clients;
use AppBundle\Form\AppointmentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class AppointmentController extends Controller
{

    /**
     * @Route("/appointment/listeappointment" , name = "listappointment")
     */
    public function listappAction(Request $request)
    {
        $day = new \Datetime();
        $date = $day->format('d/m/Y');
        $appointment = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findAll();
        $total = $this->getDoctrine()->getRepository('AppBundle:Appointment')->appointmentday($date);
        return $this->render('AppBundle:Appointment:listapp.html.twig', array(
            'appointment' => $appointment , 'notifrendezvous' => $total[0]['total']
        ));
    }


    /**
     * @Route("/appointment/addappointment" , name = "addappointment" )
     */
    public function addappAction(Request $request)
    {
        $app = new Appointment();

        $form = $this->createForm(AppointmentType::class, $app);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($app);
            $em->flush();

            return $this->redirectToRoute('listappointment',array());

        }
        
        return $this->render('AppBundle:Appointment:addapp.html.twig', array(
            'appoint_form' => $form->createView(),  
        ));
    }


}
