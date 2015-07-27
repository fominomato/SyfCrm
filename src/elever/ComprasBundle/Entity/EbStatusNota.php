<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbStatusNota
 *
 * @ORM\Table(name="eb_status_nota")
 * @ORM\Entity
 */
class EbStatusNota
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_status_nota", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStatusNota;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_atualizacao", type="datetime", nullable=true)
     */
    private $dtAtualizacao ;



    /**
     * Get idStatusNota
     *
     * @return integer 
     */
    public function getIdStatusNota()
    {
        return $this->idStatusNota;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbStatusNota
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
     * Set dtAtualizacao
     *
     * @param \DateTime $dtAtualizacao
     * @return EbStatusNota
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
		return $this->idStatusNota;
	}

	public function __toString()
	{
		return $this->nome;
	}
}
