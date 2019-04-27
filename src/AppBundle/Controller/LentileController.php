<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Clients;
use AppBundle\Form\LentileType;
use AppBundle\Entity\Lentile;
use Symfony\Component\HttpFoundation\Request;

class LentileController extends Controller
{

    /**
     * @Route("/dossier/cree-dossier-lentile/{id}" , name = "creedossierlentile")
     */
    
    public function create_dir_lentile($id,Request $request)
    {
        $lent = new Lentile();

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Clients');
        
        $clients = $repository->find($id);

        $form = $this->createForm(LentileType::class, $lent);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $lent->setClient($clients);
            $refProdMont = $lent->getLenref()->getRefproduit();
            $stockRepository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Stock');
            $stockRepository->misajourqantite($refProdMont);
            $em = $this->getDoctrine()->getManager();
            $em->persist($lent);
            $em->flush();
            return $this->redirectToRoute('directoryclient',array('id' => $id));
        }

        return $this->render('AppBundle:Lentile:create_dir_lentile.html.twig',array(
            'form' => $form->createView(),
        ));

    }

}
