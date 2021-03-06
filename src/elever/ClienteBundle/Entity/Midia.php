<?php

namespace elever\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Midia
 *
 * @ORM\Table(name="eb_midia", uniqueConstraints={@ORM\UniqueConstraint(name="id_midia_UNIQUE", columns={"id_midia"})})
 * @ORM\Entity()
 */
class Midia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_midia", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;

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
	public function getDtAtualizacao ()
	{
		return $this->dtAtualizacao;
	}

	/**
	 * @param \DateTime $dtAtualizacao
	 */
	public function setDtAtualizacao ($dtAtualizacao)
	{
		$this->dtAtualizacao = $dtAtualizacao;
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
}
