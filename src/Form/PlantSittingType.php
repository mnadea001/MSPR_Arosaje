<?php

namespace App\Form;

use App\Entity\PlantSitting;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlantSittingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start_date')
            ->add('end_date')
            ->add('createdAt')
            ->add('user')
            ->add('plant')
            ->add('botanist')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PlantSitting::class,
        ]);
    }
}
