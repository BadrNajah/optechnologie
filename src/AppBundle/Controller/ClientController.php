<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Clients;
use AppBundle\Entity\Directory;
use AppBundle\Entity\Mont;
use AppBundle\Entity\Stock;
use AppBundle\Form\MontType;
use AppBundle\Form\ClientsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class ClientController extends Controller
{

    /**
     * @Route("/" , name = "list-clients")
     */
    public function ListClient(Request $request)
    {

        $clients = $this->getDoctrine()->getRepository('AppBundle:Clients')->findBy([], ['date' => 'DESC']);
        
        return $this->render('AppBundle:Client:create.html.twig', array(
            'clients' => $clients
        ));
    }

    /**
     * @Route("/clients/addclient" , name = "addclient")
     */
    public function AddClient(Request $request)
    {

        $client = new Clients();
        $form = $this->createForm(ClientsType::class, $client);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
             
            $client->setDate( new \Datetime() );
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash("success", "Client Bien Ajouter");
            return $this->redirectToRoute('list-clients',array());
        }else{
            $this->addFlash("danger", "Numero de tel deja exist");
        }

        return $this->render('AppBundle:Client:addclient.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/clients/editclient-{id}" , name = "editclient")
     */
    public function EditClient($id,Request $request)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Clients');
        
        $client = $repository->find($id);

        $client->setNom($client->getNom());
        $client->setPrenom($client->getPrenom());
        $client->setTel($client->getTel());
        
        $form = $this->createForm(ClientsType::class, $client);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
             
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            $this->addFlash("success", "Client Bien Modifier");
            return $this->redirectToRoute('list-clients',array());
        }

        return $this->render('AppBundle:Client:editclient.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/clients/deleteclient-{id}" , name = "deleteclient")
     */
    public function DeleteClient($id)
    {
        $em = $this->getDoctrine()->getManager();

        $client = $em->getRepository('AppBundle:Clients')->find($id);

        $em->remove($client);

        $em->flush();

        return $this->redirectToRoute('list-clients');
    }



    /**
     * @Route("/clients/directoryclient/{id}" , name = "directoryclient")
     */
    public function ListDirectoryClients($id,Request $request)
    {
        $repository = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle:Clients');
      
        $clients = $repository->find($id);

        $directory = $this->getDoctrine()->getRepository('AppBundle:Mont')->findBy(array('client' => $id));
        $lentile = $this->getDoctrine()->getRepository('AppBundle:Lentile')->findBy(array('client' => $id));

        $total_price_mont = $this->getDoctrine()->getRepository('AppBundle:Mont')->CountTotalPriceMontOfClient($id);
        $total_price_lentil = $this->getDoctrine()->getRepository('AppBundle:Mont')->CountTotalPriceLentilOfClient($id);
        $total_avance_mont = $this->getDoctrine()->getRepository('AppBundle:Mont')->CountAvancePriceMontOfClient($id);
        $total_avance_lentil = $this->getDoctrine()->getRepository('AppBundle:Mont')->CountAvancePriceLentilOfClient($id);
        $avance_by_dir = $this->getDoctrine()->getRepository('AppBundle:Avance')->avance_by_dir();
        
        $sum_avance = 0;
        if($total_avance_mont != null ){
            $sum_avance = $total_avance_mont[0]['totalavancemont'];
            if($total_avance_lentil != null){
                $sum_avance = $sum_avance + $total_avance_lentil[0]['totalavancelentil'];
            }
        }
        elseif($total_avance_lentil != null){
            $sum_avance = $total_avance_lentil[0]['totalavancelentil'];
            if($total_avance_lentil != null){
                $sum_avance = $sum_avance + $total_avance_lentil[0]['totalavancelentil'];
            }
        }
        else{
            $sum_avance = 0;
        }

        $total_price = 0;
        if($total_price_mont != null ){
            $total_price = $total_price_mont[0]['totalmont'];
            if($total_price_lentil != null){
                $total_price = $total_price + $total_price_lentil[0]['totalentil'];
            }
        }
        elseif($total_price_lentil != null){
            $total_price = $total_price_lentil[0]['totalentil'];
            if($total_price_mont != null){
                $total_price = $total_price + $total_price_mont[0]['totalmont'];
            }
        }
        else{
            $total_price = 0;
        }

        return $this->render('AppBundle:Client:directoryclient.html.twig',array(
            'directory' => $directory,
            'lentile' => $lentile,
            'avance_by_dir' => $avance_by_dir,
            'client' => $clients,
            'total_price' => $total_price,
            'avance' => $sum_avance
        ));
    }

    /**
     * @Route("/directory/addirectoryclient/{id}" , name = "addirectoryclient")
     */
    
    public function AddirectoryClient($id,Request $request)
    {
        $mont = new Mont();

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Clients');
        
        $clients = $repository->find($id);


        $form = $this->createForm(MontType::class, $mont);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $mont->setClient($clients);
            $refProdMont = $mont->getRefMont()->getRefproduit();
            $refProdVerre = $mont->getRefVerre()->getRefproduit();
            $stockRepository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Stock');
            $stockRepository->misajourqantite($refProdMont);
            $stockRepository->misajourqantite($refProdVerre);
            $em = $this->getDoctrine()->getManager();
            $em->persist($mont);
            $em->flush();
            return $this->redirectToRoute('directoryclient',array('id' => $id));
        }

        return $this->render('AppBundle:Client:addirectory.html.twig',array(
            'form' => $form->createView(),
        ));

    }
    

    /**
     * @Route("/directory/deletedirectoryclient/{id_client}/{id_directory}" , name = "deletedirectoryclient")
     */
    public function DeleteDirectoryClient($id_client,$id_directory,Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $directory = $em->getRepository('AppBundle:Mont')->find($id_directory);

        $em->remove($directory);

        $em->flush();

        return $this->redirectToRoute('directoryclient',array('id' => $id_client));
    }



    /**
     * @Route("/directory/editdirectory/{id}/{idclient}" , name = "editdirectory")
     */
    public function Editdirectory($id,$idclient,Request $request)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Mont');
        
        $dirmont = $repository->find($id);

        $dirmont->setCorrOdSph($dirmont->getCorrOdSph());
        $dirmont->setCorrOdCyl($dirmont->getCorrOdCyl());
        $dirmont->setCorrOdAxe($dirmont->getCorrOdAxe());
        $dirmont->setCorrOdEip($dirmont->getCorrOdEip());
        $dirmont->setCorrOdPrisme($dirmont->getCorrOdPrisme());
        $dirmont->setCorrOdAdd($dirmont->getCorrOdAdd());
        
        $dirmont->setCorrOgSph($dirmont->getCorrOgSph());
        $dirmont->setCorrOgCyl($dirmont->getCorrOgCyl());
        $dirmont->setCorrOgAxe($dirmont->getCorrOgAxe());
        $dirmont->setCorrOgEip($dirmont->getCorrOgEip());
        $dirmont->setCorrOgPrisme($dirmont->getCorrOgPrisme());
        $dirmont->setCorrOgAdd($dirmont->getCorrOgAdd());

        $form = $this->createForm(MontType::class, $dirmont);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dirmont);
            $em->flush();
            return $this->redirectToRoute('directoryclient',array('id' => $idclient));
        }

        return $this->render('AppBundle:Client:editdirectory.html.twig', array(
            'form' => $form->createView()
        ));
    }

    


}
