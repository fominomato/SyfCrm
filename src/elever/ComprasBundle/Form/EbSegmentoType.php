<?php

namespace elever\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EbSegmentoType extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm (FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nome')
			->add('ativo')
			->add('idRegra');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions (OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'elever\ComprasBundle\Entity\EbSegmento'
		));
	}

	/**
	 * @return string
	 */
	public function getName ()
	{
		return 'elever_comprasbundle_ebsegmento';
	}
}
