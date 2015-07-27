<?php

namespace elever\ClienteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', 'text', array('label' => 'Nome: ', 'attr' => array('class' => 'form-control', 'placeholder' => 'Digite o nome da conta')))
            ->add('email', 'text', array('label' => 'Email de contato: ', 'attr' => array('type'=> 'email', 'class' => 'col-sm-10', 'placeholder' => 'Digite um email de contato')))
            ->add('cnpj')
            ->add('cpf')
            ->add('emailOutro')
            ->add('ativo')
            ->add('excluido')
            ->add('idUsuario')
            ->add('idTemperatura')
            ->add('idMomento')
            ->add('idClienteRelacionado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elever\ClienteBundle\Entity\Cliente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elever_clientebundle_cliente';
    }
}
