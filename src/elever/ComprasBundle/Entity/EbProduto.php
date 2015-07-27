<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbProduto
 *
 * @ORM\Table(name="eb_produto", uniqueConstraints={@ORM\UniqueConstraint(name="id_produto_UNIQUE", columns={"id_produto"})}, indexes={@ORM\Index(name="FK_PRODUTO_EMPRESA_idx", columns={"id_empresa"}), @ORM\Index(name="FK_PRODUTO_FORNECEDOR_idx", columns={"id_fornecedor"}), @ORM\Index(name="FK_PRODUTO_STATUS_PRODUTO_idx", columns={"id_status_produto"}), @ORM\Index(name="FK_PRODUTO_STATUS_PRECO_idx", columns={"id_subsegmento"}), @ORM\Index(name="FK_PRODUTO_CAMPANHA_idx", columns={"id_campanha"}), @ORM\Index(name="FK_PRODUTO_USUARIO_idx", columns={"id_usuario"}), @ORM\Index(name="ID_PRODUTO_PEDIDO", columns={"pedido"}), @ORM\Index(name="ID_PRODUTO_CHASSIS", columns={"chassis"}), @ORM\Index(name="FK_PRODUTO_PRODUTO_CATEGORIA_idx", columns={"id_produto_categoria"})})
 * @ORM\Entity
 */
class EbProduto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduto;

    /**
     * @var string
     *
     * @ORM\Column(name="pedido", type="string", length=150, nullable=false)
     */
    private $pedido;

    /**
     * @var string
     *
     * @ORM\Column(name="chassis", type="string", length=255, nullable=true)
     */
    private $chassis;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="moeda", type="string", length=3, nullable=true)
     */
    private $moeda = 'R$';

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=45, nullable=true)
     */
    private $cor;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_fabricacao", type="string", length=4, nullable=true)
     */
    private $anoFabricacao;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_modelo", type="string", length=4, nullable=true)
     */
    private $anoModelo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluido", type="boolean", nullable=true)
     */
    private $excluido =  false;

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
    private $dtAtualizacao ;

    /**
     * @var \elever\ClienteBundle\Entity\Campanha
     *
     * @ORM\ManyToOne(targetEntity="elever\ClienteBundle\Entity\Campanha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_campanha", referencedColumnName="id_campanha")
     * })
     */
    private $idCampanha;


    /**
     * @var \elever\ComprasBundle\Entity\EbCondicaoPagamento
     *
     * @ORM\ManyToOne(targetEntity="elever\ComprasBundle\Entity\EbCondicaoPagamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_condicao_pagamento", referencedColumnName="id_condicao_pagamento")
     * })
     */
    private $idCondicaoPagamento;

    /**
     * @var \PrincipalBundle\Entity\EbEmpresa
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empresa", referencedColumnName="id_empresa", nullable=false)
     * })
     */
    private $idEmpresa;

    /**
     * @var \EbFornecedor
     *
     * @ORM\ManyToOne(targetEntity="EbFornecedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_fornecedor", referencedColumnName="id_fornecedor")
     * })
     */
    private $idFornecedor;

    /**
     * @var \EbProdutoCategoria
     *
     * @ORM\ManyToOne(targetEntity="EbProdutoCategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto_categoria", referencedColumnName="id_produto_categoria", nullable=false)
     * })
     */
    private $idProdutoCategoria;

    /**
     * @var \EbSubsegmento
     *
     * @ORM\ManyToOne(targetEntity="EbSubsegmento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_subsegmento", referencedColumnName="id_subsegmento", nullable=false)
     * })
     */
    private $idSubsegmento;

    /**
     * @var \EbStatusProduto
     *
     * @ORM\ManyToOne(targetEntity="EbStatusProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_produto", referencedColumnName="id_status_tarefa", nullable=false)
     * })
     */
    private $idStatusProduto;

    /**
     * @var \PrincipalBundle\Entity\EbUsuario
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario", nullable=false)
     * })
     */
    private $idUsuario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbNfe", inversedBy="idProduto")
     * @ORM\JoinTable(name="eb_produto_nfe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_nfe", referencedColumnName="id_nfe")
     *   }
     * )
     */
    private $idNfe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbNotaCredito", inversedBy="idProduto")
     * @ORM\JoinTable(name="eb_produto_nota_credito",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_nota_credito", referencedColumnName="id_nota_credito")
     *   }
     * )
     */
    private $idNotaCredito;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbVenda", inversedBy="idProduto")
     * @ORM\JoinTable(name="eb_venda_produto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_venda", referencedColumnName="id_venda")
     *   }
     * )
     */
    private $idVenda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idNfe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idNotaCredito = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idVenda = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idProduto
     *
     * @return integer 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set pedido
     *
     * @param string $pedido
     * @return EbProduto
     */
    public function setPedido($pedido)
    {
        $this->pedido = $pedido;

        return $this;
    }

    /**
     * Get pedido
     *
     * @return string 
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * Set chassis
     *
     * @param string $chassis
     * @return EbProduto
     */
    public function setChassis($chassis)
    {
        $this->chassis = $chassis;

        return $this;
    }

    /**
     * Get chassis
     *
     * @return string 
     */
    public function getChassis()
    {
        return $this->chassis;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return EbProduto
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
     * Set moeda
     *
     * @param string $moeda
     * @return EbProduto
     */
    public function setMoeda($moeda)
    {
        $this->moeda = $moeda;

        return $this;
    }

    /**
     * Get moeda
     *
     * @return string 
     */
    public function getMoeda()
    {
        return $this->moeda;
    }

    /**
     * Set cor
     *
     * @param string $cor
     * @return EbProduto
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get cor
     *
     * @return string 
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * Set anoFabricacao
     *
     * @param string $anoFabricacao
     * @return EbProduto
     */
    public function setAnoFabricacao($anoFabricacao)
    {
        $this->anoFabricacao = $anoFabricacao;

        return $this;
    }

    /**
     * Get anoFabricacao
     *
     * @return string 
     */
    public function getAnoFabricacao()
    {
        return $this->anoFabricacao;
    }

    /**
     * Set anoModelo
     *
     * @param string $anoModelo
     * @return EbProduto
     */
    public function setAnoModelo($anoModelo)
    {
        $this->anoModelo = $anoModelo;

        return $this;
    }

    /**
     * Get anoModelo
     *
     * @return string 
     */
    public function getAnoModelo()
    {
        return $this->anoModelo;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbProduto
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
     * Set excluido
     *
     * @param boolean $excluido
     * @return EbProduto
     */
    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;

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
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbProduto
     */
    public function setDtCadastro($dtCadastro)
    {
        $this->dtCadastro = $dtCadastro;

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
     * Set dtAtualizacao
     *
     * @param \DateTime $dtAtualizacao
     * @return EbProduto
     */
    public function setDtAtualizacao($dtAtualizacao)
    {
        $this->dtAtualizacao = $dtAtualizacao;

        return $this;
    }

    /**
     * Get dtAtualizacao
     *
     * @return \DateTime 
     */
    public function getDtAtualizacao()
    {
        return $this->dtAtualizacao;
    }

    /**
     * Set idCampanha
     *
     * @param \elever\ClienteBundle\Entity\Campanha $idCampanha
     * @return EbProduto
     */
    public function setIdCampanha(\elever\ClienteBundle\Entity\Campanha $idCampanha = null)
    {
        $this->idCampanha = $idCampanha;

        return $this;
    }

    /**
     * Get idCampanha
     *
     * @return \elever\ClienteBundle\Entity\Campanha
     */
    public function getIdCampanha()
    {
        return $this->idCampanha;
    }

    /**
     * Set idEmpresa
     *
     * @param \PrincipalBundle\Entity\EbEmpresa $idEmpresa
     * @return EbProduto
     */
    public function setIdEmpresa(\PrincipalBundle\Entity\EbEmpresa $idEmpresa = null)
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }

    /**
     * Get idEmpresa
     *
     * @return \PrincipalBundle\Entity\EbEmpresa
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * Set idFornecedor
     *
     * @param \elever\ComprasBundle\Entity\EbFornecedor $idFornecedor
     * @return EbProduto
     */
    public function setIdFornecedor(\elever\ComprasBundle\Entity\EbFornecedor $idFornecedor = null)
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    /**
     * Get idFornecedor
     *
     * @return \elever\ComprasBundle\Entity\EbFornecedor 
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Set idProdutoCategoria
     *
     * @param \elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria
     * @return EbProduto
     */
    public function setIdProdutoCategoria(\elever\ComprasBundle\Entity\EbProdutoCategoria $idProdutoCategoria = null)
    {
        $this->idProdutoCategoria = $idProdutoCategoria;

        return $this;
    }

    /**
     * Get idProdutoCategoria
     *
     * @return \elever\ComprasBundle\Entity\EbProdutoCategoria 
     */
    public function getIdProdutoCategoria()
    {
        return $this->idProdutoCategoria;
    }

    /**
     * Set idSubsegmento
     *
     * @param \elever\ComprasBundle\Entity\EbSubsegmento $idSubsegmento
     * @return EbProduto
     */
    public function setIdSubsegmento(\elever\ComprasBundle\Entity\EbSubsegmento $idSubsegmento = null)
    {
        $this->idSubsegmento = $idSubsegmento;

        return $this;
    }

    /**
     * Get idSubsegmento
     *
     * @return \elever\ComprasBundle\Entity\EbSubsegmento 
     */
    public function getIdSubsegmento()
    {
        return $this->idSubsegmento;
    }

    /**
     * Set idStatusProduto
     *
     * @param \elever\ComprasBundle\Entity\EbStatusProduto $idStatusProduto
     * @return EbProduto
     */
    public function setIdStatusProduto(\elever\ComprasBundle\Entity\EbStatusProduto $idStatusProduto = null)
    {
        $this->idStatusProduto = $idStatusProduto;

        return $this;
    }

    /**
     * Get idStatusProduto
     *
     * @return \elever\ComprasBundle\Entity\EbStatusProduto 
     */
    public function getIdStatusProduto()
    {
        return $this->idStatusProduto;
    }

    /**
     * Set idUsuario
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuario
     * @return EbProduto
     */
    public function setIdUsuario(\PrincipalBundle\Entity\EbUsuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \PrincipalBundle\Entity\EbUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Add idNfe
     *
     * @param \elever\ComprasBundle\Entity\EbNfe $idNfe
     * @return EbProduto
     */
    public function addIdNfe(\elever\ComprasBundle\Entity\EbNfe $idNfe)
    {
        $this->idNfe[] = $idNfe;

        return $this;
    }

    /**
     * Remove idNfe
     *
     * @param \elever\ComprasBundle\Entity\EbNfe $idNfe
     */
    public function removeIdNfe(\elever\ComprasBundle\Entity\EbNfe $idNfe)
    {
        $this->idNfe->removeElement($idNfe);
    }

    /**
     * Get idNfe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdNfe()
    {
        return $this->idNfe;
    }

    /**
     * Add idNotaCredito
     *
     * @param \elever\ComprasBundle\Entity\EbNotaCredito $idNotaCredito
     * @return EbProduto
     */
    public function addIdNotaCredito(\elever\ComprasBundle\Entity\EbNotaCredito $idNotaCredito)
    {
        $this->idNotaCredito[] = $idNotaCredito;

        return $this;
    }

    /**
     * Remove idNotaCredito
     *
     * @param \elever\ComprasBundle\Entity\EbNotaCredito $idNotaCredito
     */
    public function removeIdNotaCredito(\elever\ComprasBundle\Entity\EbNotaCredito $idNotaCredito)
    {
        $this->idNotaCredito->removeElement($idNotaCredito);
    }

    /**
     * Get idNotaCredito
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdNotaCredito()
    {
        return $this->idNotaCredito;
    }

    /**
     * Add idVenda
     *
     * @param \elever\ComprasBundle\Entity\EbVenda $idVenda
     * @return EbProduto
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

    /**
    * Set idCondicaoPagamento
     *
     * @param \elever\ComprasBundle\Entity\EbCondicaoPagamento $idCondicaoPagamento
     * @return EbProduto
     */
    public function setIdCondicaoPagamento(\elever\ComprasBundle\Entity\EbCondicaoPagamento $idCondicaoPagamento = null)
    {
        $this->idCondicaoPagamento = $idCondicaoPagamento;

        return $this;
    }

    /**
     * Get idCondicaoPagamento
     *
     * @return \elever\ComprasBundle\Entity\EbCondicaoPagamento
     */
    public function getIdCondicaoPagamento()
    {
        return $this->idCondicaoPagamento;
    }



	public function getId()
	{
		return $this->idSubsegmento;
	}

	public function __toString()
	{
		return $this->chassis;
	}

}
