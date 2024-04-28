<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom'
            ])
            ->add('description', null, [
                'label' => 'Description'
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'multiple' => false,
                'mapped' => false,
                'attr' => array('accept' => 'image/jpeg,image/jpg,image/png,image/svg+xml'),
                'required' => false
            ])
            ->add('price', null, [
                'label' => 'Prix'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
