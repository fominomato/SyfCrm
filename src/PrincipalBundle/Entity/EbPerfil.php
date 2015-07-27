<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbPerfil
 *
 * @ORM\Table(name="eb_perfil", uniqueConstraints={@ORM\UniqueConstraint(name="id_perfil_UNIQUE", columns={"id_perfil"})})
 * @ORM\Entity(repositoryClass="PrincipalBundle\Entity\EbPerfilRepository")
 */
class EbPerfil
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_perfil", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPerfil;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=false)
     */
    private $ativo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbModulo", mappedBy="idPerfil")
     */
    private $idModulo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbUsuario", mappedBy="idPerfil")
     */
    private $idUsuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idModulo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idPerfil
     *
     * @return integer 
     */
    public function getIdPerfil()
    {
        return $this->idPerfil;
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
     * @return EbPerfil
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
     * @return EbPerfil
     */
	public function setAtivo ($ativo)
    {
	    $this->ativo = $ativo;

	    return $this;
    }

    /**
     * Add idModulo
     *
     * @param \PrincipalBundle\Entity\EbModulo $idModulo
     * @return EbPerfil
     */
    public function addIdModulo(\PrincipalBundle\Entity\EbModulo $idModulo)
    {
        $this->idModulo[] = $idModulo;

        return $this;
    }

    /**
     * Remove idModulo
     *
     * @param \PrincipalBundle\Entity\EbModulo $idModulo
     */
    public function removeIdModulo(\PrincipalBundle\Entity\EbModulo $idModulo)
    {
        $this->idModulo->removeElement($idModulo);
    }

    /**
     * Get idModulo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Add idUsuario
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuario
     * @return EbPerfil
     */
    public function addIdUsuario(\PrincipalBundle\Entity\EbUsuario $idUsuario)
    {
        $this->idUsuario[] = $idUsuario;

        return $this;
    }

    /**
     * Remove idUsuario
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuario
     */
    public function removeIdUsuario(\PrincipalBundle\Entity\EbUsuario $idUsuario)
    {
        $this->idUsuario->removeElement($idUsuario);
    }

    /**
     * Get idUsuario
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

	public function __toString ()
	{
		return $this->nome;
	}
}
