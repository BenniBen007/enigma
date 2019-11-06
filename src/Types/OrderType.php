<?php
namespace App\Types;

use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Types\SelectionType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class OrderType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $option) {
        $builder
            ->add('status', ChoiceType::class, [
                'choices' => array_combine(Order::STATUSES, Order::STATUSES)
            ]);
        
        $builder->add('name', TextareaType::class);

        $builder->add('selections', CollectionType::class, ['entry_type' => SelectionType::Class, 'allow_add' => true, 'prototype' => true, 'by_reference' => false]);

        $builder->add('Créer', SubmitType::class, ['attr' => ['class'=>'btn-primary']]);
    }
}