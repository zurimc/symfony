<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class messurementUnitsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',  TextType::class, 
            [
                'attr' =>[
                    'class' =>"form-control"
                ]
            ])
            ->add('status', CheckboxType::class,
                [
                    'required' => false,
                    'attr' =>[
                        'style' =>""
                    ]
                ]
            )
            ->add('dateCreate', TextType::class,
            [
                'required' => false,
                'attr' =>[
                    'value' => '',
                ]
            ])
            ->add('dateUpdate',  TextType::class,
            [
                'required' => false,
                'attr' =>[
                    'value' => "",
                ]
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\messurementUnits'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_messurementunits';
    }


}
