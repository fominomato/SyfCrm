<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbNfe
 *
 * @ORM\Table(name="eb_nfe", indexes={@ORM\Index(name="FK_NFE_STATUS_NOTA_idx", columns={"id_status_nota"}), @ORM\Index(name="ID_NFE_CHASSIS", columns={"chassis"}), @ORM\Index(name="ID_NFE_PEDIDO", columns={"pedido"})})
 * @ORM\Entity
 */
class EbNfe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nfe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNfe;

    /**
     * @var string
     *
     * @ORM\Column(name="chassis", type="string", length=255, nullable=true)
     */
    private $chassis;

    /**
     * @var string
     *
     * @ORM\Column(name="pedido", type="string", length=150, nullable=false)
     */
    private $pedido;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=45, nullable=true)
     */
    private $valor;

    /**
     * @var string
     *
     * @ORM\Column(name="pis", type="string", length=45, nullable=true)
     */
    private $pis;

    /**
     * @var string
     *
     * @ORM\Column(name="cofins", type="string", length=45, nullable=true)
     */
    private $cofins;

    /**
     * @var string
     *
     * @ORM\Column(name="ipi", type="string", length=45, nullable=true)
     */
    private $ipi;

    /**
     * @var string
     *
     * @ORM\Column(name="nro_nfe", type="string", length=255, nullable=true)
     */
    private $nroNfe;

    /**
     * @var string
     *
     * @ORM\Column(name="icms", type="string", length=45, nullable=true)
     */
    private $icms;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_nfe", type="datetime", nullable=true)
     */
    private $dtNfe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var \EbStatusNota
     *
     * @ORM\ManyToOne(targetEntity="EbStatusNota")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_status_nota", referencedColumnName="id_status_nota")
     * })
     */
    private $idStatusNota;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="EbProduto", mappedBy="idNfe")
     */
    private $idProduto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProduto = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idNfe
     *
     * @return integer 
     */
    public function getIdNfe()
    {
        return $this->idNfe;
    }

    /**
     * Set chassis
     *
     * @param string $chassis
     * @return EbNfe
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
     * Set pedido
     *
     * @param string $pedido
     * @return EbNfe
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
     * Set valor
     *
     * @param string $valor
     * @return EbNfe
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
     * Set pis
     *
     * @param string $pis
     * @return EbNfe
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
     * Set cofins
     *
     * @param string $cofins
     * @return EbNfe
     */
    public function setCofins($cofins)
    {
        $this->cofins = $cofins;

        return $this;
    }

    /**
     * Get cofins
     *
     * @return string 
     */
    public function getCofins()
    {
        return $this->cofins;
    }

    /**
     * Set ipi
     *
     * @param string $ipi
     * @return EbNfe
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
     * Set nroNfe
     *
     * @param string $nroNfe
     * @return EbNfe
     */
    public function setNroNfe($nroNfe)
    {
        $this->nroNfe = $nroNfe;

        return $this;
    }

    /**
     * Get nroNfe
     *
     * @return string 
     */
    public function getNroNfe()
    {
        return $this->nroNfe;
    }

    /**
     * Set icms
     *
     * @param string $icms
     * @return EbNfe
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
     * Set dtNfe
     *
     * @param \DateTime $dtNfe
     * @return EbNfe
     */
    public function setDtNfe($dtNfe)
    {
        $this->dtNfe = $dtNfe;

        return $this;
    }

    /**
     * Get dtNfe
     *
     * @return \DateTime 
     */
    public function getDtNfe()
    {
        return $this->dtNfe;
    }

    /**
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbNfe
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
     * Set idStatusNota
     *
     * @param \elever\ComprasBundle\Entity\EbStatusNota $idStatusNota
     * @return EbNfe
     */
    public function setIdStatusNota(\elever\ComprasBundle\Entity\EbStatusNota $idStatusNota = null)
    {
        $this->idStatusNota = $idStatusNota;

        return $this;
    }

    /**
     * Get idStatusNota
     *
     * @return \elever\ComprasBundle\Entity\EbStatusNota 
     */
    public function getIdStatusNota()
    {
        return $this->idStatusNota;
    }

    /**
     * Add idProduto
     *
     * @param \elever\ComprasBundle\Entity\EbProduto $idProduto
     * @return EbNfe
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



	public function getId()
	{
		return $this->idNfe;
	}

	public function __toString()
	{
		return $this->nroNfe;
	}

}
