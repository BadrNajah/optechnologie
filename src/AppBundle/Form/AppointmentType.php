<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use AppBundle\Entity\Appointment;
use AppBundle\Entity\Clients;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AppointmentType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
        ->add('client', EntityType::class, array(
            'class' => 'AppBundle:Clients',
            
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->orderBy('u.nom', 'ASC');
            },
            'choice_label' => function ($client) {
                return $client->getNom() . ' ' . $client->getPrenom();
            },
            'label' => 'Client',
            'attr' => array('class' => 'form-control'),
        ))
        ->add('commentaire', TextareaType::class, 
            array(
                'label' => 'Commantaire',
                'attr' => array('class' => 'form-control'),
        ))
        ->add('date', TextType::class, 
        array(
            'label' => 'Date',
            'attr' => array('class' => 'form-control get_date'),
        ))
        ->add(
            'registerapp', SubmitType::class,
            array(
                'label' => 'Ajouter Rendez vous',
                'attr'  => array('class' => 'btn btn-success'),
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Appointment::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_appointment';
    }


}
