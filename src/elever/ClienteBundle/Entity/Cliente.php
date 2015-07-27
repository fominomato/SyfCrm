<?php

namespace elever\ClienteBundle\Entity;

use PrincipalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Cliente
 *
 * @ORM\Table(name="eb_cliente", uniqueConstraints={@ORM\UniqueConstraint(name="id_cliente_UNIQUE", columns={"id_cliente"})}, indexes={@ORM\Index(name="FK_CLIENTE_USUARIO_idx", columns={"id_usuario"})})
 * @ORM\Entity(repositoryClass="elever\ClienteBundle\Entity\ClienteRepository")
 */
class Cliente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cliente", type="integer")
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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Email()
     */
    private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cnpj", type="string", length=100, nullable=true)
	 */
	private $cnpj;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cpf", type="string", length=15, nullable=true)
	 */
	private $cpf;

	/**
     * @var string
     *
     * @ORM\Column(name="email_outro", type="string", length=255, nullable=true)
     * @Assert\Email()
     */
    private $emailOutro;

	/**
	 * @var \PrincipalBundle\Entity\EbUsuario
	 *
	 *
	 * @ORM\ManyToOne(targetEntity="\PrincipalBundle\Entity\EbUsuario")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
	 * })
     */
    private $idUsuario;

    /**
     * @var Temperatura
     *
     *
     * @ORM\ManyToOne(targetEntity="Temperatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_temperatura", referencedColumnName="id_temperatura")
     * })
     */
    private $idTemperatura;

    /**
     * @var Momento
     *
     *
     * @ORM\ManyToOne(targetEntity="Momento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_momento", referencedColumnName="id_momento")
     * })
     */
    private $idMomento;

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
     * @var \DateTime
     *
     * @ORM\Column(name="dt_atualizacao", type="datetime", nullable=true)
     */
    private $dtAtualizacao;

    /**
     * @var Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente_relacionado", referencedColumnName="id_cliente")
     * })
     */
    private $idClienteRelacionado;


	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->idUsuario = new \Doctrine\Common\Collections\ArrayCollection();
		$this->idMomento = new \Doctrine\Common\Collections\ArrayCollection();
		$this->idTemperatura = new \Doctrine\Common\Collections\ArrayCollection();
		$this->idClienteRelacionado = new \Doctrine\Common\Collections\ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * @return Cliente
     */
	public function setNome ($nome)
    {
	    $this->nome = $nome;

	    return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
	public function getEmail ()
    {
	    return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Cliente
     */
	public function setEmail ($email)
    {
	    $this->email = $email;

	    return $this;
    }

    /**
     * Get emailOutro
     *
     * @return string
     */
	public function getEmailOutro ()
    {
	    return $this->emailOutro;
    }

    /**
     * Set emailOutro
     *
     * @param string $emailOutro
     * @return Cliente
     */
	public function setEmailOutro ($emailOutro)
    {
	    $this->emailOutro = $emailOutro;

	    return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer
     */
	public function getIdUsuario ()
    {
	    return $this->idUsuario;
    }

    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Cliente
     */
	public function setIdUsuario ($idUsuario)
    {
	    $this->idUsuario = $idUsuario;

	    return $this;
    }

    /**
     * Get idTemperatura
     *
     * @return integer
     */
	public function getIdTemperatura ()
    {
	    return $this->idTemperatura;
    }

    /**
     * Set idTemperatura
     *
     * @param integer $idTemperatura
     * @return Cliente
     */
	public function setIdTemperatura ($idTemperatura)
    {
	    $this->idTemperatura = $idTemperatura;

	    return $this;
    }

    /**
     * Get idMomento
     *
     * @return integer
     */
	public function getIdMomento ()
    {
	    return $this->idMomento;
    }

    /**
     * Set idMomento
     *
     * @param integer $idMomento
     * @return Cliente
     */
	public function setIdMomento ($idMomento)
    {
	    $this->idMomento = $idMomento;

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
     * @return Cliente
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
     * @return Cliente
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
     * @return Cliente
     */
	public function setDtCadastro ($dtCadastro)
    {
	    $this->dtCadastro = $dtCadastro;

	    return $this;
    }

    /**
     * Get dtAtualizacao
     *
     * @return \DateTime
     */
	public function getDtAtualizacao ()
    {
	    return $this->dtAtualizacao;
    }

    /**
     * Set dtAtualizacao
     *
     * @param \DateTime $dtAtualizacao
     * @return Cliente
     */
	public function setDtAtualizacao ($dtAtualizacao)
    {
	    $this->dtAtualizacao = $dtAtualizacao;

	    return $this;
    }

    /**
     * Get idClienteRelacionado
     *
     * @return integer
     */
	public function getIdClienteRelacionado ()
    {
	    return $this->idClienteRelacionado;
    }

    /**
     * Set idClienteRelacionado
     *
     * @param integer $idClienteRelacionado
     * @return Cliente
     */
	public function setIdClienteRelacionado ($idClienteRelacionado)
    {
	    $this->idClienteRelacionado = $idClienteRelacionado;

	    return $this;
    }

	/**
	 * @return string
	 */
	public function getCnpj ()
	{
		return $this->cnpj;
	}

	/**
	 * @param string $cnpj
	 */
	public function setCnpj ($cnpj)
	{
		$this->cnpj = $cnpj;
	}

	/**
	 * @return string
	 */
	public function getCpf ()
	{
		return $this->cpf;
	}

	/**
	 * @param string $cpf
	 */
	public function setCpf ($cpf)
	{
		$this->cpf = $cpf;
	}


	public function __toString ()
	{
		return $this->nome;
	}


}
