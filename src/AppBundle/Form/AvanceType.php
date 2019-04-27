<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AvanceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('avance', TextType::class,
            array(
                'label' => 'Avance',
                'attr'  => array('class' => 'form-control'),
        ))
        ->add('dateAvance',TextType::class,
            array(
                'label' => 'Date',
                'attr'  => array('class' => 'form-control get_date'),
        ))
        ->add('save', SubmitType::class, 
            array(
            'label' => 'Ajouter Dossier',
            'attr'  => array('class' => 'btn btn-default'),
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Avance'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_avance';
    }


}
