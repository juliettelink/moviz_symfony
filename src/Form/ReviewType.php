<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rate', ChoiceType::class,[   //choice c case à coché ou radio
                'label' =>'votre note',
                'choices' => [
                '5' => 5,
                '4' => 4,
                '3' => 3,
                '2' => 2,
                '1' => 1
                ],
                'attr' => [          //attribut pour le css
                    'class' => 'rate'
                ],
                'expanded' => true, // pour des cases à cocher 
                'multiple' => false, // ne pouvoir en chosir qu'un seul
               
                ])
            ->add('review')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
