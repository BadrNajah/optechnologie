<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Clients;
use AppBundle\Entity\Avance;
use AppBundle\Entity\Mont;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class StatistiqueController extends Controller
{
    /**
     * @Route("/admin/statistique" , name = "statistique")
     */
    public function statistiqueEtab(Request $request)
    {
        $conn = $this->getDoctrine()->getManager();
        $statistique = $conn->getRepository('AppBundle:Mont')->statistique();
        $avance_array = $conn->getRepository('AppBundle:Mont')->avance_array();

        $nbrClients = $this->getDoctrine()->getRepository('AppBundle:Clients')->nbrClients();
        $sumAvance = $this->getDoctrine()->getRepository('AppBundle:Avance')->sumAvance();
        $sumTotal = $this->getDoctrine()->getRepository('AppBundle:Mont')->sumTotal();
        $sumRest = $sumTotal[0]['total'] - $sumAvance[0]['total_avance'];
        $current_month = date('n');
        $caisse_day_of_moth = $this->getDoctrine()->getRepository('AppBundle:Avance')->get_caisse_stat($current_month );
        $arrayName = array(array('Jour', 'Caisse du Jour'),);
        for ($i = 0 ; $i < sizeof($caisse_day_of_moth) ; $i++){
            $arrayName[$i+1] = array($caisse_day_of_moth[$i]['datedujour'],(int)$caisse_day_of_moth[$i]['caissedujour']);
        }
        $newColumnChart = new ColumnChart();
        $newColumnChart->getData()->setArrayToDataTable($arrayName);
        $newColumnChart->getOptions()->getLegend()->setPosition('top');
        $newColumnChart->getOptions()->setWidth('50%');
        $newColumnChart->getOptions()->setHeight(350);

        return $this->render('AppBundle:Admin:statistique.html.twig',
            array(
                'statistique' => $statistique,
                'avance_array' => $avance_array , 
                'nbrclients' => $nbrClients[0]['nbrclients'] , 
                'sumAvance' => $sumAvance[0]['total_avance'],
                'sumRest' => $sumRest , 
                'sumTotal' => $sumTotal[0]['total'],
                'newColumnChart' => $newColumnChart,
            ));
    }


    public function todaycaissetotalAction(Request $request)
    {
        if($request->request->get('today')){
            $today = $request->request->get('today');
            $sumAvance = $this->getDoctrine()->getRepository('AppBundle:Avance')->TodayCaisse();
            $length = sizeof($sumAvance);
            for($i = 0 ; $i < $length ; $i++){
                if($sumAvance[$i]['date_avance'] == $today){
                    $totalCaisse = $sumAvance[$i]['total_avance'];
                }
            }
            return new JsonResponse($totalCaisse);
        }
    }












}