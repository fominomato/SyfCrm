<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbProdutoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pedido')
            ->add('chassis')
            ->add('valor')
            ->add('moeda')
            ->add('cor')
            ->add('anoFabricacao')
            ->add('anoModelo')
            ->add('ativo')
            ->add('excluido')
            ->add('dtCadastro')
            ->add('dtAtualizacao')
            ->add('idCampanha')
            ->add('idEmpresa')
            ->add('idFornecedor')
            ->add('idProdutoCategoria')
            ->add('idSubsegmento')
            ->add('idStatusProduto')
            ->add('idUsuario')
            ->add('idNfe')
            ->add('idNotaCredito')
            ->add('idVenda')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elever\ComprasBundle\Entity\EbProduto'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elever_comprasbundle_ebproduto';
    }
}
