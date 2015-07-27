<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbVenda
 *
 * @ORM\Table(name="eb_venda", indexes={@ORM\Index(name="FK_VENDA_CLIENTE_idx", columns={"id_cliente"}), @ORM\Index(name="FK_VENDA_STATUS_VENDA_idx", columns={"id_status_venda"}), @ORM\Index(name="FK_VENDA_CAMPANHA_idx", columns={"id_campanha"})})
 * @ORM\Entity
 */
class EbVenda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_venda", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVenda;

    /**
     * @var float
     *
     * @ORM\Column(name="valor", type="float", precision=10, scale=0, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="moeda", type="string", length=3, nullable=true)
     */
    private $moeda;

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
     * @var \elever\ClienteBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="elever\ClienteBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
     * })
     */
    private $idCliente;

    /**
     * @var \EbStatusVenda
     *
     * @ORM\ManyToOne(targetEntity="EbStatusVenda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_venda", referencedColumnName="id_status_venda")
     * })
     */
    private $idStatusVenda;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbProduto", mappedBy="idVenda")
     */
    private $idProduto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbRegra", inversedBy="idVenda")
     * @ORM\JoinTable(name="eb_venda_regra",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_venda", referencedColumnName="id_venda")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_regra", referencedColumnName="id_regra")
     *   }
     * )
     */
    private $idRegra;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProduto = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idRegra = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idVenda
     *
     * @return integer 
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * Set valor
     *
     * @param float $valor
     * @return EbVenda
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
     * @return EbVenda
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
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbVenda
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
     * @return EbVenda
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
     * @return EbVenda
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
     * Set idCliente
     *
     * @param \elever\ClienteBundle\Entity\Cliente $idCliente
     * @return EbVenda
     */
    public function setIdCliente(\elever\ClienteBundle\Entity\Cliente $idCliente = null)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return \elever\ClienteBundle\Entity\Cliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set idStatusVenda
     *
     * @param \elever\ComprasBundle\Entity\EbStatusVenda $idStatusVenda
     * @return EbVenda
     */
    public function setIdStatusVenda(\elever\ComprasBundle\Entity\EbStatusVenda $idStatusVenda = null)
    {
        $this->idStatusVenda = $idStatusVenda;

        return $this;
    }

    /**
     * Get idStatusVenda
     *
     * @return \elever\ComprasBundle\Entity\EbStatusVenda 
     */
    public function getIdStatusVenda()
    {
        return $this->idStatusVenda;
    }

    /**
     * Add idProduto
     *
     * @param \elever\ComprasBundle\Entity\EbProduto $idProduto
     * @return EbVenda
     */
    public function addIdProduto(\elever\ComprasBundle\Entity\EbProduto $idProduto)
    {
        $this->idProduto[] = $idProduto;

        return $this;
    }

    /**
     * Remove idProduto
     *
     * @param \elever\ComprasBundle\Entity\EbProduto $idProduto
     */
    public function removeIdProduto(\elever\ComprasBundle\Entity\EbProduto $idProduto)
    {
        $this->idProduto->removeElement($idProduto);
    }

    /**
     * Get idProduto
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Add idRegra
     *
     * @param \elever\ComprasBundle\Entity\EbRegra $idRegra
     * @return EbVenda
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
}
