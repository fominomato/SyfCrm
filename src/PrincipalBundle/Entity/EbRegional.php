<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbRegional
 *
 * @ORM\Table(name="eb_regional")
 * @ORM\Entity
 */
class EbRegional
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_regional", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegional;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo;



    /**
     * Get idRegional
     *
     * @return integer 
     */
    public function getIdRegional()
    {
        return $this->idRegional;
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
     * @return EbRegional
     */
	public function setNome ($nome)
    {
	    $this->nome = $nome;

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
     * @return EbRegional
     */
	public function setAtivo ($ativo)
    {
	    $this->ativo = $ativo;

	    return $this;
    }

	public function __toString ()
	{
		return $this->nome;
	}

	public function getId ()
	{
		return $this->idRegional;
	}
}
