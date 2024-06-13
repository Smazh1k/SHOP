<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Address name',
                'attr' => [
                    'placeholder' => 'e.g. Home'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'First Name'
            ])
            ->add('lastname', TextType::class, [
                'label' =>'Last Name'
            ])
            ->add('company', TextType::class, [
                'label' => 'Company (optional)',
                'required' => false,
            ])
            ->add('address', TextType::class, [
                'label' => 'Postal Address',
                'attr' => [
                    'placeholder' => 'e.g. 8 Lasoif Street'
                ]
            ])
            ->add('postal', TextType::class, [
                'label' => 'Postal Code'
            ])
            ->add('city', TextType::class, [
                'label' => 'City'
            ])
            ->add('country', CountryType::class, [
                'label' => 'Country'
            ])
            ->add('phone', TelType::class, [
                'label' => 'Phone'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save Address',
                'attr' => [
                    'class' => 'btn btn-info btn-block mt-2'
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
