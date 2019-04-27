<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Stock;
use AppBundle\Entity\Lentile;
use Doctrine\ORM\EntityRepository;

class LentileType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('lensOdSph',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOdCyl',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOdAxe',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOdK1',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOdK2',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOgSph',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOgCyl',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOgAxe',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOgK1',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lensOgK2',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lenref', EntityType::class, array(
            'class' => 'AppBundle:Stock',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->andWhere('u.category = :searchTerm')
                ->andWhere('u.qantite > :searchQantite')
                ->setParameter('searchTerm', 'Lentil')
                ->setParameter('searchQantite', '0')
                ->orderBy('u.refproduit', 'ASC');
            },
            'choice_label' => 'refproduit',
            'label' => 'refproduit',
            'attr' => array('class' => 'form-control'),
        ))
        ->add('lenprix',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('lendate',TextType::class,
            array(
                'label' => 'Date',
                'attr'  => array('class' => 'form-control get_date'),
            )
        )
        ->add('save', SubmitType::class, 
            array(
            'label' => 'Ajouter Dossier',
            'attr'  => array('class' => 'btn btn-default'),
            )
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Lentile::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_lentile';
    }


}
