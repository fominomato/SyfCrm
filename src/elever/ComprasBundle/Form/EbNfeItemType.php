<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbNfeItemType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm (FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nome')
			->add('descricao')
			->add('cor')
			->add('valor')
			->add('icms')
			->add('ipi')
			->add('pis')
			->add('dtCadastro')
			->add('idNfe');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions (OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'elever\ComprasBundle\Entity\EbNfeItem'
		));
	}

	/**
	 * @return string
	 */
	public function getName ()
	{
		return 'elever_comprasbundle_ebnfeitem';
	}
}
