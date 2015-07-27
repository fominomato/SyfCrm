<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbProdutoCategoria
 *
 * @ORM\Table(name="eb_produto_categoria")
 * @ORM\Entity
 */
class EbProdutoCategoria
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id_produto_categoria", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $idProdutoCategoria;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="nome", type="string", length=50, nullable=false)
	 */
	private $nome;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="descricao", type="string", length=150, nullable=true)
	 */
	private $descricao;

	/**
	 * @var boolean
	 *
	 * @ORM\Column(name="ativo", type="boolean", nullable=true)
	 */
	private $ativo = true;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="EbRegra", mappedBy="idProdutoCategoria")
	 */
	private $idRegra;

	/**
	 * Constructor
	 */
	public function __construct ()
	{
		$this->idRegra = new \Doctrine\Common\Collections\ArrayCollection();
	}


	/**
	 * Get idProdutoCategoria
	 *
	 * @return integer
	 */
	public function getIdProdutoCategoria ()
	{
		return $this->idProdutoCategoria;
	}

	/**
	 * Get nome
	 *
	 * @return string
	 */
	public function getNome ()
	{
		return $this->nome;
	}

	/**
	 * Set nome
	 *
	 * @param string $nome
	 * @return EbProdutoCategoria
	 */
	public function setNome ($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * Get descricao
	 *
	 * @return string
	 */
	public function getDescricao ()
	{
		return $this->descricao;
	}

	/**
	 * Set descricao
	 *
	 * @param string $descricao
	 * @return EbProdutoCategoria
	 */
	public function setDescricao ($descricao)
	{
		$this->descricao = $descricao;

		return $this;
	}

	/**
	 * Get ativo
	 *
	 * @return boolean
	 */
	public function getAtivo ()
	{
		return $this->ativo;
	}

	/**
	 * Set ativo
	 *
	 * @param boolean $ativo
	 * @return EbProdutoCategoria
	 */
	public function setAtivo ($ativo)
	{
		$this->ativo = $ativo;

		return $this;
	}

	/**
	 * Add idRegra
	 *
	 * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
	 * @return EbProdutoCategoria
	 */
	public function addIdRegra (\elever\ComprasBundle\Entity\EbRegra $idRegra)
	{
		$this->idRegra[] = $idRegra;

		return $this;
	}

	/**
	 * Remove idRegra
	 *
	 * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
	 */
	public function removeIdRegra (\elever\ComprasBundle\Entity\EbRegra $idRegra)
	{
		$this->idRegra->removeElement($idRegra);
	}

	/**
	 * Get idRegra
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getIdRegra ()
	{
		return $this->idRegra;
	}

	public function getId ()
	{
		return $this->idProdutoCategoria;
	}

	public function __toString ()
	{
		return $this->nome;
	}

}
