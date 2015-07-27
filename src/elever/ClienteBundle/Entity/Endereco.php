<?php

namespace elever\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Endereco
 *
 * @ORM\Table(name="eb_cliente_endereco", uniqueConstraints={@ORM\UniqueConstraint(name="id_endereco_UNIQUE", columns={"id_endereco"})})
 * @ORM\Entity()
 */
class Endereco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_endereco", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logradouro", type="string", length=300)
     */
    private $logradouro;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cep", type="string", length=11)
	 */
	private $cep;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cidade", type="string", length=150)
	 */
	private $cidade;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="uf", type="string", length=2)
	 */
	private $uf;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="tel", type="string", length=10)
	 */
	private $tel;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dddtel", type="string", length=3)
	 */
	private $dddtel;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="cel", type="string", length=10)
	 */
	private $cel;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dddcel", type="string", length=3)
	 */
	private $dddcel;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="teloutro", type="string", length=10)
	 */
	private $teloutro;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="dddoutro", type="string", length=3)
	 */
	private $dddoutro;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="favorito", type="boolean")
	 */
	private $favorito;

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
	 * @return boolean
	 */
	public function isAtivo ()
	{
		return $this->ativo;
	}

	/**
	 * @param boolean $ativo
	 */
	public function setAtivo ($ativo)
	{
		$this->ativo = $ativo;
	}

	/**
	 * @return string
	 */
	public function getCel ()
	{
		return $this->cel;
	}

	/**
	 * @param string $cel
	 */
	public function setCel ($cel)
	{
		$this->cel = $cel;
	}

	/**
	 * @return string
	 */
	public function getCep ()
	{
		return $this->cep;
	}

	/**
	 * @param string $cep
	 */
	public function setCep ($cep)
	{
		$this->cep = $cep;
	}

	/**
	 * @return string
	 */
	public function getCidade ()
	{
		return $this->cidade;
	}

	/**
	 * @param string $cidade
	 */
	public function setCidade ($cidade)
	{
		$this->cidade = $cidade;
	}

	/**
	 * @return string
	 */
	public function getDddcel ()
	{
		return $this->dddcel;
	}

	/**
	 * @param string $dddcel
	 */
	public function setDddcel ($dddcel)
	{
		$this->dddcel = $dddcel;
	}

	/**
	 * @return string
	 */
	public function getDddoutro ()
	{
		return $this->dddoutro;
	}

	/**
	 * @param string $dddoutro
	 */
	public function setDddoutro ($dddoutro)
	{
		$this->dddoutro = $dddoutro;
	}

	/**
	 * @return string
	 */
	public function getDddtel ()
	{
		return $this->dddtel;
	}

	/**
	 * @param string $dddtel
	 */
	public function setDddtel ($dddtel)
	{
		$this->dddtel = $dddtel;
	}

	/**
	 * @return \DateTime
	 */
	public function getDtCadastro ()
	{
		return $this->dtCadastro;
	}

	/**
	 * @param \DateTime $dtCadastro
	 */
	public function setDtCadastro ($dtCadastro)
	{
		$this->dtCadastro = $dtCadastro;
	}

	/**
	 * @return boolean
	 */
	public function isExcluido ()
	{
		return $this->excluido;
	}

	/**
	 * @param boolean $excluido
	 */
	public function setExcluido ($excluido)
	{
		$this->excluido = $excluido;
	}

	/**
	 * @return string
	 */
	public function getFavorito ()
	{
		return $this->favorito;
	}

	/**
	 * @param string $favorito
	 */
	public function setFavorito ($favorito)
	{
		$this->favorito = $favorito;
	}

	/**
	 * @return int
	 */
	public function getId ()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId ($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getLogradouro ()
	{
		return $this->logradouro;
	}

	/**
	 * @param string $logradouro
	 */
	public function setLogradouro ($logradouro)
	{
		$this->logradouro = $logradouro;
	}

	/**
	 * @return string
	 */
	public function getTel ()
	{
		return $this->tel;
	}

	/**
	 * @param string $tel
	 */
	public function setTel ($tel)
	{
		$this->tel = $tel;
	}

	/**
	 * @return string
	 */
	public function getTeloutro ()
	{
		return $this->teloutro;
	}

	/**
	 * @param string $teloutro
	 */
	public function setTeloutro ($teloutro)
	{
		$this->teloutro = $teloutro;
	}

	/**
	 * @return string
	 */
	public function getUf ()
	{
		return $this->uf;
	}

	/**
	 * @param string $uf
	 */
	public function setUf ($uf)
	{
		$this->uf = $uf;
	}


	public function __toString ()
	{
		return $this->logradouro;
	}


}
