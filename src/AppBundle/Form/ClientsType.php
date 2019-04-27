<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,
                array(
                    'label' => 'Nom',
                    'attr'  => array('class' => 'form-control'),
            ))
            ->add('prenom',TextType::class,
                array(
                    'label' => 'Prenom',
                    'attr'  => array('class' => 'form-control'),
            ))
            ->add('tel',TextType::class,
                array(
                    'label' => 'N° Telephone',
                    'attr'  => array('class' => 'form-control'),
            ))
            ->add('date',TextType::class,
                array(
                    'label' => 'Date',
                    'attr'  => array(
                        'class' => 'form-control get_date',
                        'readonly' => true,
                    ),
            ))
            ->add('save', SubmitType::class, 
                array(
                    'label' => 'Ajouter Client',
                    'attr'  => array('class' => 'btn btn-default'),
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Clients'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_clients';
    }


}
