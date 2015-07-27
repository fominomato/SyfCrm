<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbModulo
 *
 * @ORM\Table(name="eb_modulo")
 * @ORM\Entity
 */
class EbModulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_modulo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModulo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluido", type="boolean", nullable=false)
     */
    private $excluido;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbPerfil", inversedBy="idModulo")
     * @ORM\JoinTable(name="eb_modulo_permissao",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_modulo", referencedColumnName="id_modulo")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_perfil", referencedColumnName="id_perfil")
     *   }
     * )
     */
    private $idPerfil;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPerfil = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idModulo
     *
     * @return integer 
     */
    public function getIdModulo()
    {
        return $this->idModulo;
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
     * @return EbModulo
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
     * @return EbModulo
     */
	public function setAtivo ($ativo)
    {
	    $this->ativo = $ativo;

	    return $this;
    }

    /**
     * Get excluido
     *
     * @return boolean
     */
	public function getExcluido ()
    {
	    return $this->excluido;
    }

    /**
     * Set excluido
     *
     * @param boolean $excluido
     * @return EbModulo
     */
	public function setExcluido ($excluido)
    {
	    $this->excluido = $excluido;

	    return $this;
    }

    /**
     * Add idPerfil
     *
     * @param \PrincipalBundle\Entity\EbPerfil $idPerfil
     * @return EbModulo
     */
    public function addIdPerfil(\PrincipalBundle\Entity\EbPerfil $idPerfil)
    {
        $this->idPerfil[] = $idPerfil;

        return $this;
    }

    /**
     * Remove idPerfil
     *
     * @param \PrincipalBundle\Entity\EbPerfil $idPerfil
     */
    public function removeIdPerfil(\PrincipalBundle\Entity\EbPerfil $idPerfil)
    {
        $this->idPerfil->removeElement($idPerfil);
    }

    /**
     * Get idPerfil
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
    }


	public function __toString ()
	{
		return $this->nome;
	}

	public function getId ()
	{
		return $this->idModulo;
	}
}
