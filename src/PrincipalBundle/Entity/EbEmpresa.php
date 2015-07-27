<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbEmpresa
 *
 * @ORM\Table(name="eb_empresa", uniqueConstraints={@ORM\UniqueConstraint(name="id_empresa_UNIQUE", columns={"id_empresa"})}, indexes={@ORM\Index(name="FK_REGIONAL_EMPRESA_idx", columns={"id_regional"})})
 * @ORM\Entity
 */
class EbEmpresa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_empresa", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="logradouro", type="text", nullable=true)
     */
    private $logradouro;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="text", nullable=true)
     */
    private $bairro;

    /**
     * @var string
     *
     * @ORM\Column(name="cidade", type="string", length=200, nullable=true)
     */
    private $cidade;

    /**
     * @var string
     *
     * @ORM\Column(name="uf", type="string", length=2, nullable=true)
     */
    private $uf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluido", type="boolean", nullable=true)
     */
    private $excluido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var \PrincipalBundle\Entity\EbRegional
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbRegional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_regional", referencedColumnName="id_regional")
     * })
     */
    private $idRegional;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\elever\ComprasBundle\Entity\EbRegra", mappedBy="idEmpresa")
     */
    private $idRegra;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbUsuario", mappedBy="idEmpresa")
     */
    private $idUsuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idRegra = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idEmpresa
     *
     * @return integer 
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
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
     * @return EbEmpresa
     */
	public function setNome ($nome)
    {
	    $this->nome = $nome;

	    return $this;
    }

    /**
     * Get logradouro
     *
     * @return string
     */
	public function getLogradouro ()
    {
	    return $this->logradouro;
    }

    /**
     * Set logradouro
     *
     * @param string $logradouro
     * @return EbEmpresa
     */
	public function setLogradouro ($logradouro)
    {
	    $this->logradouro = $logradouro;

	    return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
	public function getBairro ()
    {
	    return $this->bairro;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     * @return EbEmpresa
     */
	public function setBairro ($bairro)
    {
	    $this->bairro = $bairro;

	    return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
	public function getCidade ()
    {
	    return $this->cidade;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     * @return EbEmpresa
     */
	public function setCidade ($cidade)
    {
	    $this->cidade = $cidade;

	    return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
	public function getUf ()
    {
	    return $this->uf;
    }

    /**
     * Set uf
     *
     * @param string $uf
     * @return EbEmpresa
     */
	public function setUf ($uf)
    {
	    $this->uf = $uf;

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
     * @return EbEmpresa
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
     * @return EbEmpresa
     */
	public function setExcluido ($excluido)
    {
	    $this->excluido = $excluido;

	    return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return \DateTime
     */
	public function getDtCadastro ()
    {
	    return $this->dtCadastro;
    }

    /**
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbEmpresa
     */
	public function setDtCadastro ($dtCadastro)
    {
	    $this->dtCadastro = $dtCadastro;

	    return $this;
    }

    /**
     * Get idRegional
     *
     * @return \PrincipalBundle\Entity\EbRegional
     */
	public function getIdRegional ()
    {
	    return $this->idRegional;
    }

    /**
     * Set idRegional
     *
     * @param \PrincipalBundle\Entity\EbRegional $idRegional
     * @return EbEmpresa
     */
	public function setIdRegional (\PrincipalBundle\Entity\EbRegional $idRegional = null)
    {
	    $this->idRegional = $idRegional;

	    return $this;
    }

    /**
     * Add idRegra
     *
     * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
     * @return EbEmpresa
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

    /**
     * Add idUsuario
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuario
     * @return EbEmpresa
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
