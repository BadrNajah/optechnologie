<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Stock;
use Symfony\Component\HttpFoundation\Request;

class StockType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('refproduit',TextType::class,
            array(
                'label' => 'Ref° Produite',
                'attr'  => array('class' => 'form-control'),
        ))
        ->add('prixachat',TextType::class,
            array(
                'label' => 'Prix d\'Achat',
                'attr'  => array('class' => 'form-control'),
        ))
        ->add('prixvente',TextType::class,
            array(
                'label' => 'Prix de Vent',
                'attr'  => array('class' => 'form-control'),     
        ))
        ->add('qantite',TextType::class,
            array(
                'label' => 'Qantite',
                'attr'  => array('class' => 'form-control'),     
        ))
        ->add('category', ChoiceType::class, array(
            'choices' => array('monture' => 'Monture', 'verre' => 'Verre', 'lentil' => 'Lentil'),
            'expanded' => true,
        ))
        ->add('fournisseur',TextType::class,
            array(
                'label' => 'Fournisseur',
                'attr'  => array('class' => 'form-control'),     
        ))
        ->add(
            'registerstock', SubmitType::class,
            array(
                'label' => 'Ajouter Produit',
                'attr'  => array('class' => 'btn btn-success'),
        ));

    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Stock::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_stock';
    }


}
