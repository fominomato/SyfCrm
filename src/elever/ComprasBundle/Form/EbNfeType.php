<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbNfeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('chassis')
            ->add('pedido')
            ->add('valor')
            ->add('pis')
            ->add('cofins')
            ->add('ipi')
            ->add('nroNfe')
            ->add('icms')
            ->add('dtNfe')
            ->add('dtCadastro')
            ->add('idStatusNota')
            ->add('idProduto')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elever\ComprasBundle\Entity\EbNfe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elever_comprasbundle_ebnfe';
    }
}
