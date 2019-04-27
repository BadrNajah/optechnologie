<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Entity\Member;
use Symfony\Component\HttpFoundation\Request;

class MemberType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username', TextType::class,
                array(
                    'label' => 'Nom',
                    'attr'  => array('class' => 'form-control'),
                ))
            ->add(
                'email', EmailType::class,
                array(
                    'label' => 'Email',
                    'attr'  => array('class' => 'form-control'),
                ))
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Password',
                    'attr'  => array('class' => 'form-control'),
                ],
                'second_options' => [
                    'label' => 'Repeat Password',
                    'attr'  => array('class' => 'form-control'),
                ]
            ])
            ->add('roles', ChoiceType::class, array(
                'multiple' => true,
                'expanded' => true,
                'choices'  => array(
                    'Admin' => 'ROLE_ADMIN',
                    'Utilisateur' => 'ROLE_VEND',
                ),
            ))
            ->add(
                'register', SubmitType::class,
                array(
                    'label' => 'Regester',
                    'attr'  => array('class' => 'btn btn-success'),
            ));
        
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Member::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_member';
    }


}
