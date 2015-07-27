<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbCondicaoPagamento
 *
 * @ORM\Table(name="eb_condicao_pagamento")
 * @ORM\Entity()
 */
class EbCondicaoPagamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_condicao_pagamento", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCondicaoPagamento;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_condicao_pagamento", type="string", length=400, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

	public function getId()
	{
		return $this->idCondicaoPagamento;
	}

	public function __toString()
	{
		return $this->nome;
	}

    /**
     * @return boolean
     */
    public function isAtivo()
    {
        return $this->ativo;
    }

    /**
     * @param boolean $ativo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return \DateTime
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * @param \DateTime $dtCadastro
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;
    }

    /**
     * @return int
     */
    public function getIdCondicaoPagamento()
    {
        return $this->idCondicaoPagamento;
    }

    /**
     * @param int $idCondicaoPagamento
     */
    public function setIdCondicaoPagamento($idCondicaoPagamento)
    {
        $this->idCondicaoPagamento = $idCondicaoPagamento;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



}
