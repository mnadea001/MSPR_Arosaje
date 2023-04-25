<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Plant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Objet',
                "attr"=>[
                    "class"=>"form-control"
                ]
            ])
            ->add('imageFile')
            ->add('description', TextType::class, [
                'label' => 'Objet',
                "attr"=>[
                    "class"=>"form-control"
                ]
            ])
            ->add('createdAt')
            ->add('user', EntityType::class, [
                'label' => 'Proprietaire',
                "class"=> User::class,
                "choice_label"=> "username",
                "attr"=>[
                    "class"=>"form-select"
                ]
            ])
            ->add('advice')
            ->add('plantSittings')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plant::class,
        ]);
    }
}
