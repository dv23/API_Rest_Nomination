<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
//use Symony\Compnent\Valiator\Constraints\Blank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('email')
        ->add('entreprise',
        //[
        //    'data' => 'abcdef',
        //]
        //->add('entreprise', null, 
        //[
        //'required'   => false,
        //'empty_data' => 'John',
        //],
        //ChoiceType::class, ['required' => false, 
        EntityType::class, array('class' => 'AppBundle:Entreprise','choice_label' => 'nom', )
        //EntityType::class, array('class' => 'AppBundle:Entreprise','choice_label' => function ($choice, $key, $value) {
        //    if (true === $choice) {
        //        return 'Definitely!';
        //    }
        //       return strtoupper($key);
        // or if you want to translate some key
        //return 'form.choice.'.$key;
        //    }, )
        //]
        );
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
