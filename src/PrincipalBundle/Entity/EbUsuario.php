<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * EbUsuario
 *
 * @ORM\Table(name="eb_usuario", uniqueConstraints={@ORM\UniqueConstraint(name="id_usuario_UNIQUE", columns={"id_usuario"})}, indexes={@ORM\Index(name="FK_USUARIO_USUARIO_idx", columns={"id_usuario_responsavel"})})
 * @ORM\Entity(repositoryClass="PrincipalBundle\Entity\EbUsuarioRepository")
 */
class EbUsuario implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

	private $roles = array();

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="imagen", type="text", nullable=true)
     */
    private $imagen;

    /**
     * @var string
     *
     * @Assert\Email(
     *     message = "O email '{{ value }}' não é válido digite outro.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Assert\NotNull()
     *
     * @ORM\Column(name="password", type="text", nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="text", nullable=true)
     */
    private $token;

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
     * @Assert\DateTime()
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=false)
     */
    private $dtCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=45, nullable=true)
     */
    private $salt;

    /**
     * @var \PrincipalBundle\Entity\EbUsuario
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_responsavel", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioResponsavel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbEmpresa", inversedBy="idUsuario")
     * @ORM\JoinTable(name="eb_usuario_empresa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_empresa", referencedColumnName="id_empresa")
     *   }
     * )
     */
    private $idEmpresa;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbPerfil", inversedBy="idUsuario")
     * @ORM\JoinTable(name="eb_usuario_perfil",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
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
        $this->idEmpresa = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idPerfil = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nome
     *
     * @param string $nome
     * @return EbUsuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return EbUsuario
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return EbUsuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return EbUsuario
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return EbUsuario
     */
    public function setToken($token)
    {
        $this->token = $token;

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
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbUsuario
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get excluido
     *
     * @return boolean
     */
    public function getExcluido()
    {
        return $this->excluido;
    }

    /**
     * Set excluido
     *
     * @param boolean $excluido
     * @return EbUsuario
     */
    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;

        return $this;
    }

    /**
     * Get dtCadastro
     *
     * @return \DateTime
     */
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }

    /**
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbUsuario
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return EbUsuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get idUsuarioResponsavel
     *
     * @return \PrincipalBundle\Entity\EbUsuario
     */
    public function getIdUsuarioResponsavel()
    {
        return $this->idUsuarioResponsavel;
    }

    /**
     * Set idUsuarioResponsavel
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuarioResponsavel
     * @return EbUsuario
     */
    public function setIdUsuarioResponsavel(\PrincipalBundle\Entity\EbUsuario $idUsuarioResponsavel = null)
    {
        $this->idUsuarioResponsavel = $idUsuarioResponsavel;

        return $this;
    }

    /**
     * Add idEmpresa
     *
     * @param \PrincipalBundle\Entity\EbEmpresa $idEmpresa
     * @return EbUsuario
     */
    public function addIdEmpresa(\PrincipalBundle\Entity\EbEmpresa $idEmpresa)
    {
        $this->idEmpresa[] = $idEmpresa;

        return $this;
    }

    /**
     * Remove idEmpresa
     *
     * @param \PrincipalBundle\Entity\EbEmpresa $idEmpresa
     */
    public function removeIdEmpresa(\PrincipalBundle\Entity\EbEmpresa $idEmpresa)
    {
        $this->idEmpresa->removeElement($idEmpresa);
    }

    /**
     * Get idEmpresa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * Add idPerfil
     *
     * @param \PrincipalBundle\Entity\EbPerfil $idPerfil
     * @return EbUsuario
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

	public function getUsername ()
	{
		return $this->email;
	}

	public function addRole ($role)
	{
		array_push($this->roles, $role);
		$this->roles = array_unique($this->roles);
		return $this;
	}

	public function getRoles ()
	{
		array_push($this->roles, "ROLE_USER");
		return array_unique($this->roles);
	}

	public function equals(UserInterface $user)
	{
		return $this->getIdUsuario() == $user->getIdUsuario();
	}

    /**
     * Get idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

	public function eraseCredentials()
	{

	}

    public function __toString()
    {
        return $this->nome;
    }


	public function getId ()
	{
		return $this->idUsuario;
	}
}
