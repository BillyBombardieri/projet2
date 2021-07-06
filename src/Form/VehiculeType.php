<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'voiture' => 'voiture',
                    'scooter' => 'scooter',
                ],
            ])
            ->add('marque')
            ->add('modele')
            ->add('numeroserie')
            ->add('couleur')
            ->add('plaqueimmatriculation')
            ->add('nbkilometre')
            ->add('dateachat')
            ->add('prixachat')
            ->add('dureelocation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
