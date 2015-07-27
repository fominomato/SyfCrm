<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbRegra
 *
 * @ORM\Table(name="eb_regra", indexes={@ORM\Index(name="FK_REGRA_VENDA_TIPO_idx", columns={"id_regra_tipo"}), @ORM\Index(name="FK_REGRA_TIPO_VALOR_idx", columns={"id_tipo_valor"})})
 * @ORM\Entity(repositoryClass="elever\ComprasBundle\Entity\RegraRepository")
 */
class EbRegra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_regra", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegra;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=false)
     */
    private $nome;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="previsao", type="string", length=3, nullable=true)
     */
    private $previsao = '10';

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
    private $dtFim ;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var \EbRegraTipoValor
     *
     * @ORM\ManyToOne(targetEntity="EbRegraTipoValor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_valor", referencedColumnName="id_tipo_valor")
     * })
     */
    private $idTipoValor;

    /**
     * @var \EbRegraTipo
     *
     * @ORM\ManyToOne(targetEntity="EbRegraTipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_regra_tipo", referencedColumnName="id_regra_tipo")
     * })
     */
    private $idRegraTipo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PrincipalBundle\Entity\EbEmpresa", inversedBy="idRegra")
     * @ORM\JoinTable(name="eb_regra_empresa",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_regra", referencedColumnName="id_regra")
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
     * @ORM\ManyToMany(targetEntity="EbProdutoCategoria", inversedBy="idRegra")
     * @ORM\JoinTable(name="eb_regra_produto_categoria",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_regra", referencedColumnName="id_regra")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_produto_categoria", referencedColumnName="id_produto_categoria")
     *   }
     * )
     */
    private $idProdutoCategoria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbSegmento", inversedBy="idRegra")
     * @ORM\JoinTable(name="eb_regra_segmento",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_regra", referencedColumnName="id_regra")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_segmento", referencedColumnName="id_segmento")
     *   }
     * )
     */
    private $idSegmento;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbVenda", mappedBy="idRegra")
     */
    private $idVenda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEmpresa = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idProdutoCategoria = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idSegmento = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idVenda = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idRegra
     *
     * @return integer 
     */
    public function getIdRegra()
    {
        return $this->idRegra;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbRegra
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
     * Set valor
     *
     * @param float $valor
     * @return EbRegra
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set previsao
     *
     * @param string $previsao
     * @return EbRegra
     */
    public function setPrevisao($previsao)
    {
        $this->previsao = $previsao;

        return $this;
    }

    /**
     * Get previsao
     *
     * @return string 
     */
    public function getPrevisao()
    {
        return $this->previsao;
    }

    /**
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return EbRegra
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return EbRegra
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbRegra
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

    /**
     * Set idTipoValor
     *
     * @param \elever\ComprasBundle\Entity\EbRegraTipoValor $idTipoValor
     * @return EbRegra
     */
    public function setIdTipoValor(\elever\ComprasBundle\Entity\EbRegraTipoValor $idTipoValor = null)
    {
        $this->idTipoValor = $idTipoValor;

        return $this;
    }

    /**
     * Get idTipoValor
     *
     * @return \elever\ComprasBundle\Entity\EbRegraTipoValor 
     */
    public function getIdTipoValor()
    {
        return $this->idTipoValor;
    }

    /**
     * Set idRegraTipo
     *
     * @param \elever\ComprasBundle\Entity\EbRegraTipo $idRegraTipo
     * @return EbRegra
     */
    public function setIdRegraTipo(\elever\ComprasBundle\Entity\EbRegraTipo $idRegraTipo = null)
    {
        $this->idRegraTipo = $idRegraTipo;

        return $this;
    }

    /**
     * Get idRegraTipo
     *
     * @return \elever\ComprasBundle\Entity\EbRegraTipo 
     */
    public function getIdRegraTipo()
    {
        return $this->idRegraTipo;
    }

    /**
     * Add idEmpresa
     *
     * @param \PrincipalBundle\Entity\EbEmpresa $idEmpresa
     * @return EbRegra
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
     * Add idProdutoCategoria
     *
     * @param \elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria
     * @return EbRegra
     */
    public function addIdProdutoCategorium(\elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria)
    {
        $this->idProdutoCategoria[] = $idProdutoCategoria;

        return $this;
    }

    /**
     * Remove idProdutoCategoria
     *
     * @param \elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria
     */
    public function removeIdProdutoCategorium(\elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria)
    {
        $this->idProdutoCategoria->removeElement($idProdutoCategoria);
    }

    /**
     * Get idProdutoCategoria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProdutoCategoria()
    {
        return $this->idProdutoCategoria;
    }

    /**
     * Add idSegmento
     *
     * @param \elever\ComprasBundle\Entity\EbSegmento $idSegmento
     * @return EbRegra
     */
    public function addIdSegmento(\elever\ComprasBundle\Entity\EbSegmento $idSegmento)
    {
        $this->idSegmento[] = $idSegmento;

        return $this;
    }

    /**
     * Remove idSegmento
     *
     * @param \elever\ComprasBundle\Entity\EbSegmento $idSegmento
     */
    public function removeIdSegmento(\elever\ComprasBundle\Entity\EbSegmento $idSegmento)
    {
        $this->idSegmento->removeElement($idSegmento);
    }

    /**
     * Get idSegmento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdSegmento()
    {
        return $this->idSegmento;
    }

    /**
     * Add idVenda
     *
     * @param \elever\ComprasBundle\Entity\EbVenda $idVenda
     * @return EbRegra
     */
    public function addIdVenda(\elever\ComprasBundle\Entity\EbVenda $idVenda)
    {
        $this->idVenda[] = $idVenda;

        return $this;
    }

    /**
     * Remove idVenda
     *
     * @param \elever\ComprasBundle\Entity\EbVenda $idVenda
     */
    public function removeIdVenda(\elever\ComprasBundle\Entity\EbVenda $idVenda)
    {
        $this->idVenda->removeElement($idVenda);
    }

    /**
     * Get idVenda
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

	public function getId()
	{
		return $this->idRegra;
	}

	public function __toString()
	{
		return $this->nome;
	}

}
