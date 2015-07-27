<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbSubsegmento
 *
 * @ORM\Table(name="eb_subsegmento", indexes={@ORM\Index(name="FK_PRECO_CATEGORIA_idx", columns={"id_segmento"})})
 * @ORM\Entity(repositoryClass="elever\ComprasBundle\Entity\SubsegmentoRepository")
 */
class EbSubsegmento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_subsegmento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSubsegmento;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=200, nullable=true)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="baumaster", type="string", length=100, nullable=true)
     */
    private $baumaster;

    /**
     * @var string
     *
     * @ORM\Column(name="variante", type="string", length=100, nullable=true)
     */
    private $variante;

    /**
     * @var string
     *
     * @ORM\Column(name="configuracao", type="text", nullable=true)
     */
    private $configuracao;

    /**
     * @var float
     *
     * @ORM\Column(name="preco_tabela", type="float", precision=10, scale=0, nullable=false)
     */
    private $precoTabela = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="preco_min", type="float", precision=10, scale=0, nullable=true)
     */
    private $precoMin;

    /**
     * @var float
     *
     * @ORM\Column(name="preco_max", type="float", precision=10, scale=0, nullable=true)
     */
    private $precoMax;

    /**
     * @var string
     *
     * @ORM\Column(name="moeda", type="string", length=3, nullable=true)
     */
    private $moeda = 'R$';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_inicio", type="datetime", nullable=true)
     */
    private $dtInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_fim", type="datetime", nullable=true)
     */
    private $dtFim;

    /**
     * @var \EbSegmento
     *
     * @ORM\ManyToOne(targetEntity="EbSegmento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_segmento", referencedColumnName="id_segmento", nullable=false)
     * })
     */
    private $idSegmento;



    /**
     * Get idSubsegmento
     *
     * @return integer 
     */
    public function getIdSubsegmento()
    {
        return $this->idSubsegmento;
    }

    /**
     * Get modelo
     *
     * @return string
     */
	public function getModelo ()
	{
		return $this->modelo;
	}

	/**
     * Set modelo
     *
     * @param string $modelo
     * @return EbSubsegmento
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get baumaster
     *
     * @return string
     */
	public function getBaumaster ()
    {
	    return $this->baumaster;
    }

    /**
     * Set baumaster
     *
     * @param string $baumaster
     * @return EbSubsegmento
     */
    public function setBaumaster($baumaster)
    {
        $this->baumaster = $baumaster;

        return $this;
    }

    /**
     * Get variante
     *
     * @return string
     */
	public function getVariante ()
    {
	    return $this->variante;
    }

    /**
     * Set variante
     *
     * @param string $variante
     * @return EbSubsegmento
     */
    public function setVariante($variante)
    {
        $this->variante = $variante;

        return $this;
    }

    /**
     * Get configuracao
     *
     * @return string
     */
	public function getConfiguracao ()
    {
	    return $this->configuracao;
    }

    /**
     * Set configuracao
     *
     * @param string $configuracao
     * @return EbSubsegmento
     */
    public function setConfiguracao($configuracao)
    {
        $this->configuracao = $configuracao;

        return $this;
    }

    /**
     * Get precoTabela
     *
     * @return float
     */
	public function getPrecoTabela ()
    {
	    return $this->precoTabela;
    }

    /**
     * Set precoTabela
     *
     * @param float $precoTabela
     * @return EbSubsegmento
     */
    public function setPrecoTabela($precoTabela)
    {
        $this->precoTabela = $precoTabela;

        return $this;
    }

    /**
     * Get precoMin
     *
     * @return float
     */
	public function getPrecoMin ()
    {
	    return $this->precoMin;
    }

    /**
     * Set precoMin
     *
     * @param float $precoMin
     * @return EbSubsegmento
     */
    public function setPrecoMin($precoMin)
    {
        $this->precoMin = $precoMin;

        return $this;
    }

    /**
     * Get precoMax
     *
     * @return float
     */
	public function getPrecoMax ()
    {
	    return $this->precoMax;
    }

    /**
     * Set precoMax
     *
     * @param float $precoMax
     * @return EbSubsegmento
     */
    public function setPrecoMax($precoMax)
    {
        $this->precoMax = $precoMax;

        return $this;
    }

    /**
     * Get moeda
     *
     * @return string
     */
	public function getMoeda ()
    {
	    return $this->moeda;
    }

    /**
     * Set moeda
     *
     * @param string $moeda
     * @return EbSubsegmento
     */
    public function setMoeda($moeda)
    {
        $this->moeda = $moeda;

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
     * @return EbSubsegmento
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;

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
     * @return EbSubsegmento
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime
     */
	public function getDtInicio ()
    {
	    return $this->dtInicio;
    }

    /**
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return EbSubsegmento
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime
     */
	public function getDtFim ()
    {
	    return $this->dtFim;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return EbSubsegmento
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get idSegmento
     *
     * @return \elever\ComprasBundle\Entity\EbSegmento
     */
	public function getIdSegmento ()
    {
	    return $this->idSegmento;
    }

    /**
     * Set idSegmento
     *
     * @param \elever\ComprasBundle\Entity\EbSegmento $idSegmento
     * @return EbSubsegmento
     */
    public function setIdSegmento(\elever\ComprasBundle\Entity\EbSegmento $idSegmento = null)
    {
        $this->idSegmento = $idSegmento;

        return $this;
    }

	public function getId()
	{
		return $this->idSubsegmento;
	}

	public function __toString()
	{
		return $this->modelo;
	}

}
