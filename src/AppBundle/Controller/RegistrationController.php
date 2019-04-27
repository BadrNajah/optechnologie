<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Member;
use AppBundle\Form\MemberType;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends Controller
{
    /**
     * @Route("/users/register", name = "addusers")
     */
    public function registerAction(Request $request)
    {

        $member = new Member();

        $form = $this->createForm(MemberType::class, $member);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this
                ->get('security.password_encoder')
                ->encodePassword(
                    $member,
                    $member->getPlainPassword()
            );

            $member->setPassword($password);

            $em = $this->getDoctrine()->getManager();

            $em->persist($member);
            $em->flush();

            return $this->redirectToRoute('list-users',array());

        }

        return $this->render('AppBundle:Registration:register.html.twig', [
            'registration_form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/users/list" , name = "list-users")
     */
    public function listeusersAction(Request $request)
    {
        $members = $this->getDoctrine()->getRepository('AppBundle:Member')->findAll();
        
        return $this->render('AppBundle::Registration/listeusers.html.twig', array(
            'members' => $members
        ));
    }

    /**
     * @Route("/users/deleteuser-{id}" , name = "deleteuser")
     */
    public function DeleteUser($id)
    {
        $em = $this->getDoctrine()->getManager();

        $member = $em->getRepository('AppBundle:Member')->find($id);

        $em->remove($member);

        $em->flush();

        return $this->redirectToRoute('list-users');
    }

    /**
     * @Route("/users/edituser-{id}" , name = "edituser")
     */
    public function EditClient($id,Request $request)
    {

        $repository = $this->getDoctrine()->getManager()->getRepository('AppBundle:Member');
        
        $member = $repository->find($id);

        $member->setUsername($member->getUsername());
        $member->setEmail($member->getEmail());

        $form = $this->createForm(MemberType::class, $member);

        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')->encodePassword(
                $member,
                $member->getPlainPassword()
            );

            $member->setPassword($password);
             
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
    
            return $this->redirectToRoute('list-users',array());
        }

        return $this->render('AppBundle:Registration:register.html.twig', [
            'registration_form' => $form->createView(),
        ]);
    }

}
