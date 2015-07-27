<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbStatusVenda
 *
 * @ORM\Table(name="eb_status_venda")
 * @ORM\Entity
 */
class EbStatusVenda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_status_venda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStatusVenda;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_atualizacao", type="datetime", nullable=true)
     */
    private $dtAtualizacao ;



    /**
     * Get idStatusVenda
     *
     * @return integer 
     */
    public function getIdStatusVenda()
    {
        return $this->idStatusVenda;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbStatusVenda
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return EbStatusVenda
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbStatusVenda
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set dtAtualizacao
     *
     * @param \DateTime $dtAtualizacao
     * @return EbStatusVenda
     */
    public function setDtAtualizacao($dtAtualizacao)
    {
        $this->dtAtualizacao = $dtAtualizacao;

        return $this;
    }

    /**
     * Get dtAtualizacao
     *
     * @return \DateTime 
     */
    public function getDtAtualizacao()
    {
        return $this->dtAtualizacao;
    }


	public function getId()
	{
		return $this->idStatusVenda;
	}

	public function __toString()
	{
		return $this->nome;
	}

}
