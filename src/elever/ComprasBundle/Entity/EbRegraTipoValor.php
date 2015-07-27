<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbRegraTipoValor
 *
 * @ORM\Table(name="eb_regra_tipo_valor")
 * @ORM\Entity
 */
class EbRegraTipoValor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_valor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoValor;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;



    /**
     * Get idTipoValor
     *
     * @return integer 
     */
    public function getIdTipoValor()
    {
        return $this->idTipoValor;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbRegraTipoValor
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbRegraTipoValor
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



	public function getId()
	{
		return $this->idTipoValor;
	}

	public function __toString()
	{
		return $this->nome;
	}

}
