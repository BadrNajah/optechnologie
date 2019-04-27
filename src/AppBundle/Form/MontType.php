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
use AppBundle\Entity\Mont;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;

class MontType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('corrOdSph',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOdCyl',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOdAxe',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOdEip',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOdPrisme',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgSph',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgCyl',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgPrisme',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgEip',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgAxe',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOgAdd',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('corrOdAdd',TextType::class,
            array('attr'  => array('class' => 'form-control'))
        )
        ->add('refMont', EntityType::class, array(
            'class' => 'AppBundle:Stock',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->andWhere('u.category = :searchTerm')
                ->andWhere('u.qantite > :searchQantite')
                ->setParameter('searchTerm', 'Verre')
                ->setParameter('searchQantite', '0')
                ->orderBy('u.refproduit', 'ASC');
            },
            'choice_label' => 'refproduit',
            'label' => 'refproduit',
            'attr' => array('class' => 'form-control'),
        ))
        ->add('refVerre', EntityType::class, array(
            'class' => 'AppBundle:Stock',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->andWhere('u.category = :searchTerm')
                    ->andWhere('u.qantite > :searchQantite')
                    ->setParameter('searchTerm', 'Monture')
                    ->setParameter('searchQantite', '0')
                    ->orderBy('u.refproduit', 'ASC');
            },
            'choice_label' => 'refproduit',
            'label' => 'refproduit',
            'attr' => array('class' => 'form-control'),
        ))
        ->add('prixMont',TextType::class,
            array(
                'label' => 'Prix Monture',
                'attr'  => array('class' => 'form-control data_done pm'),
            )
        )
        ->add('prixVerre',TextType::class,
            array(
                'label' => 'Prix Verre',
                'attr'  => array('class' => 'form-control data_done pv'),
            )
        )
        ->add('datePrestation',TextType::class,
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
            'data_class' => Mont::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_mont';
    }


}
