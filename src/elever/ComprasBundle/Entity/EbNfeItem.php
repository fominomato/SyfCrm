<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbNfeItem
 *
 * @ORM\Table(name="eb_nfe_item", indexes={@ORM\Index(name="FK_NFE_ITEM_NFE_idx", columns={"id_nfe"})})
 * @ORM\Entity
 */
class EbNfeItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nfe_item", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNfeItem;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="text", nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="cor", type="string", length=50, nullable=true)
     */
    private $cor;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=45, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="icms", type="string", length=45, nullable=true)
     */
    private $icms;

    /**
     * @var string
     *
     * @ORM\Column(name="ipi", type="string", length=45, nullable=true)
     */
    private $ipi;

    /**
     * @var string
     *
     * @ORM\Column(name="pis", type="string", length=45, nullable=true)
     */
    private $pis;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro ;

    /**
     * @var \EbNfe
     *
     * @ORM\ManyToOne(targetEntity="EbNfe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nfe", referencedColumnName="id_nfe")
     * })
     */
    private $idNfe;



    /**
     * Get idNfeItem
     *
     * @return integer 
     */
    public function getIdNfeItem()
    {
        return $this->idNfeItem;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbNfeItem
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
     * Set descricao
     *
     * @param string $descricao
     * @return EbNfeItem
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set cor
     *
     * @param string $cor
     * @return EbNfeItem
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
     * Set valor
     *
     * @param string $valor
     * @return EbNfeItem
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set icms
     *
     * @param string $icms
     * @return EbNfeItem
     */
    public function setIcms($icms)
    {
        $this->icms = $icms;

        return $this;
    }

    /**
     * Get icms
     *
     * @return string 
     */
    public function getIcms()
    {
        return $this->icms;
    }

    /**
     * Set ipi
     *
     * @param string $ipi
     * @return EbNfeItem
     */
    public function setIpi($ipi)
    {
        $this->ipi = $ipi;

        return $this;
    }

    /**
     * Get ipi
     *
     * @return string 
     */
    public function getIpi()
    {
        return $this->ipi;
    }

    /**
     * Set pis
     *
     * @param string $pis
     * @return EbNfeItem
     */
    public function setPis($pis)
    {
        $this->pis = $pis;

        return $this;
    }

    /**
     * Get pis
     *
     * @return string 
     */
    public function getPis()
    {
        return $this->pis;
    }

    /**
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbNfeItem
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
     * Set idNfe
     *
     * @param \elever\ComprasBundle\Entity\EbNfe $idNfe
     * @return EbNfeItem
     */
    public function setIdNfe(\elever\ComprasBundle\Entity\EbNfe $idNfe = null)
    {
        $this->idNfe = $idNfe;

        return $this;
    }

    /**
     * Get idNfe
     *
     * @return \elever\ComprasBundle\Entity\EbNfe 
     */
    public function getIdNfe()
    {
        return $this->idNfe;
    }
}
