<?php

namespace App\Form;

use App\Entity\Genre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('drama')
            ->add('comedy')
            ->add('triller')
            ->add('action')
            ->add('fantastic')
            ->add('horror')
            ->add('romantic')
            ->add('adventure')
            ->add('movies')
            ->add('series')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Genre::class,
        ]);
    }
}
