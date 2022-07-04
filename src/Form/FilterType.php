<?php

namespace App\Form;

use App\Entity\Filter;
use App\Entity\Place;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('place',EntityType::class, array(
                'label' => 'Lokal',
                'class' => Place::class,
                'choice_label' => 'name',))
            ->add('dateFrom', DateTimeType::class,[
            'label' => 'Od', 'date_widget' => 'single_text',
                'time_widget' => 'choice'])
            ->add('dateTo',DateTimeType::class ,[
                'label' => 'Do', 'date_widget' => 'single_text',
                'time_widget' => 'choice'])
            ->add('save', SubmitType::class, array('label' => 'Zatwierdź'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Filter::class,
        ]);
    }
}
