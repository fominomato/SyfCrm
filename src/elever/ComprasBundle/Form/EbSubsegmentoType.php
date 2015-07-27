<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbSubsegmentoType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm (FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('modelo')
			->add('baumaster')
			->add('variante')
			->add('configuracao')
			->add('precoTabela')
			->add('precoMin')
			->add('precoMax')
			->add('moeda')
			->add('dtCadastro')
			->add('ativo')
			->add('dtInicio')
			->add('dtFim')
			->add('idSegmento');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions (OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
            'data_class' => 'elever\ComprasBundle\Entity\EbSubsegmento'
		));
	}

	/**
	 * @return string
	 */
	public function getName ()
	{
        return 'elever_comprasbundle_ebSubsegmento';
	}
}
