<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbRegraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('valor')
            ->add('previsao')
            ->add('dtInicio')
            ->add('dtFim')
            ->add('ativo')
            ->add('idTipoValor')
            ->add('idRegraTipo')
            ->add('idEmpresa')
            ->add('idProdutoCategoria')
            ->add('idSegmento')
            ->add('idVenda')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elever\ComprasBundle\Entity\EbRegra'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elever_comprasbundle_ebregra';
    }
}
