<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class, [
            'label' => 'Objet',
            "attr"=>[
                "class"=>"form-control"
            ]
        ])
        ->add('message', TextareaType::class, [
            "attr"=>[
                "class"=>"form-control"
            ]
        ])
        ->add('recepient', EntityType::class, [
            'label' => 'Destinataire',
            "class"=> User::class,
            "choice_label"=> "email",
            "attr"=>[
                "class"=>"form-select"
            ]
        ])
        ->add('envoyer', SubmitType::class, [
            "attr"=>[
                "class" => ""
            ]
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
