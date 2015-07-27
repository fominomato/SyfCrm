<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbEmpresaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('logradouro')
            ->add('bairro')
            ->add('cidade')
            ->add('uf')
            ->add('ativo')
            ->add('excluido')
            ->add('dtCadastro')
            ->add('idRegional')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\EbEmpresa'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'PrincipalBundle_ebempresa';
    }
}
