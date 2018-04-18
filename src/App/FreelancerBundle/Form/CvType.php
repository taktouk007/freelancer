<?php

namespace App\FreelancerBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description', TextareaType::class, [
                'data' => null,
            ])
            ->add('degree')
            ->add('experiences')
            ->add('hourlyRate')
            ->add('totalEarned')
            ->add('nbOfJob')
            ->add('profileLink', UrlType::class)
            ->add('skills', EntityType::class, [
                'class' => 'AppFreelancerBundle:Skills',
                'choice_label' => 'title',
            ])
            ->add('languages', EntityType::class, [
                'class' => 'AppFreelancerBundle:Languages',
                'choice_label' => 'name',
            ])
            ->add('certifications', EntityType::class, [
                'class' => 'AppFreelancerBundle:Certification',
                'choice_label' => 'name',
            ])
            ->add('user');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\FreelancerBundle\Entity\Cv'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_freelancerbundle_cv';
    }


}
