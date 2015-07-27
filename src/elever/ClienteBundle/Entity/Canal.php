<?php

namespace elever\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Canal
 *
 * @ORM\Table(name="eb_canal", uniqueConstraints={@ORM\UniqueConstraint(name="id_canal_UNIQUE", columns={"id_canal"})})
 * @ORM\Entity()
 */
class Canal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_canal", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

	/**
	 * @var Campanha
	 *
	 *
	 * @ORM\ManyToOne(targetEntity="Campanha")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_campanha", referencedColumnName="id_campanha")
	 * })
	 */
	private $idCampanha;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="desconto", type="int", length=3)
	 */
	private $desconto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

	/**
	 * @return boolean
	 */
	public function isAtivo ()
	{
		return $this->ativo;
	}

	/**
	 * @param boolean $ativo
	 */
	public function setAtivo ($ativo)
	{
		$this->ativo = $ativo;
	}

	/**
	 * @return \DateTime
	 */
	public function getDtCadastro ()
	{
		return $this->dtCadastro;
	}

	/**
	 * @param \DateTime $dtCadastro
	 */
	public function setDtCadastro ($dtCadastro)
	{
		$this->dtCadastro = $dtCadastro;
	}

	/**
	 * @return int
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId ($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getNome ()
	{
		return $this->nome;
	}

	/**
	 * @param string $nome
	 */
	public function setNome ($nome)
	{
		$this->nome = $nome;
	}

	/**
	 * @return string
	 */
	public function getDesconto ()
	{
		return $this->desconto;
	}

	/**
	 * @param string $desconto
	 */
	public function setDesconto ($desconto)
	{
		$this->desconto = $desconto;
	}

	/**
	 * @return \Campanha
	 */
	public function getIdCampanha ()
	{
		return $this->idCampanha;
	}

	/**
	 * @param \Campanha $idCampanha
	 */
	public function setIdCampanha ($idCampanha)
	{
		$this->idCampanha = $idCampanha;
	}

}
