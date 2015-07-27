<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbSegmento
 *
 * @ORM\Table(name="eb_segmento")
 * @ORM\Entity(repositoryClass="elever\ComprasBundle\Entity\SegmentoRepository")
 */
class EbSegmento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_segmento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSegmento;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbRegra", mappedBy="idSegmento")
     */
    private $idRegra;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idRegra = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idSegmento
     *
     * @return integer 
     */
    public function getIdSegmento()
    {
        return $this->idSegmento;
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
     * @return EbSegmento
     */
    public function setNome($nome)
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
     * @return EbSegmento
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Add idRegra
     *
     * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
     * @return EbSegmento
     */
    public function addIdRegra(\elever\ComprasBundle\Entity\EbRegra $idRegra)
    {
        $this->idRegra[] = $idRegra;

        return $this;
    }

    /**
     * Remove idRegra
     *
     * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
     */
    public function removeIdRegra(\elever\ComprasBundle\Entity\EbRegra $idRegra)
    {
        $this->idRegra->removeElement($idRegra);
    }

    /**
     * Get idRegra
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdRegra()
    {
        return $this->idRegra;
    }

	public function getId()
	{
		return $this->idSegmento;
	}

	public function __toString()
	{
		return $this->nome;
	}

}
