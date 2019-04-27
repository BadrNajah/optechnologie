<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Stock;
use AppBundle\Form\StockType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class StockController extends Controller
{
    /**
     * @Route("stock/liststock",name = "liststock")
     */
    public function liststockAction()
    {
        $stock = $this->getDoctrine()->getRepository('AppBundle:Stock')->findAll();

        return $this->render('AppBundle:Stock:liststock.html.twig', array(
            'stocklist' => $stock
        ));
    }

    /**
     * @Route("/stock/addproduct",name = "addproduct")
     */
    public function addproductAction(Request $request)
    {
        $stock = new Stock();

        $form = $this->createForm(StockType::class, $stock);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $stock->setDate( new \Datetime() );
            $em = $this->getDoctrine()->getManager();

            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('liststock',array());

        }

        return $this->render('AppBundle:Stock:addproduct.html.twig', array(
            'stock_form' => $form->createView(),  
        ));
    }

    /**
     * @Route("/stock/deleteproduct-{id}" , name = "deleteproduct")
     */
    public function deleteproductAction($id)
    {
        $prod = $this->getDoctrine()->getManager();

        $stock = $prod->getRepository('AppBundle:Stock')->find($id);

        $prod->remove($stock);

        $prod->flush();

        return $this->redirectToRoute('liststock');
    }

    /**
     * @Route("/stock/editproduct-{id}" , name = "editproduct")
     */
    public function editeproductAction($id,Request $request)
    {

        $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Stock');
        
        $stock = $product->find($id);

        $stock->setRefproduit($stock->getRefproduit());
        $stock->setPrixachat($stock->getPrixachat());
        $stock->setPrixachat($stock->getPrixachat());
        $stock->setPrixvente($stock->getPrixvente());        
        $stock->setQantite($stock->getQantite());
        $stock->setCategory($stock->getCategory());
        $stock->setFournisseur($stock->getFournisseur());
        $form = $this->createForm(StockType::class, $stock);

        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
             
            $em = $this->getDoctrine()->getManager();
            $em->persist($stock);
            $em->flush();
    
            return $this->redirectToRoute('liststock',array());
        }

        return $this->render('AppBundle:Stock:addproduct.html.twig', array(
            'stock_form' => $form->createView(),  
        ));
    }

}
