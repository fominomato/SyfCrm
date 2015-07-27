<?php

namespace PrincipalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbUsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('imagen')
            ->add('email')
            ->add('password')
            ->add('token')
            ->add('ativo')
            ->add('excluido')
            ->add('dtCadastro')
            ->add('salt')
            ->add('idUsuarioResponsavel')
            ->add('idEmpresa')
            ->add('idPerfil')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrincipalBundle\Entity\EbUsuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'principalbundle_ebusuario';
    }
}
