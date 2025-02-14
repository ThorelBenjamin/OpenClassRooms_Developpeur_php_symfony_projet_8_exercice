<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class , ['label' => 'Nom de la voiture'])
            ->add('description')
            ->add('prix_mensuel', NumberType::class, ['label' => 'Prix mensuel'])
            ->add('prix_journalier', NumberType::class, ['label' => 'Prix journalier'])
            ->add('nombre_de_place', ChoiceType::class, [
                'label' => 'Nombre de place',
                'choices' => range(1, 9),
                'choice_label' => function ($choice) {
                    return $choice;
                }
            ])
            ->add('manuelle', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    'Manuelle' => 1,
                    'Automatique' => 0
                 ],
                'multiple' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
