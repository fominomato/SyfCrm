<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbNotaCredito
 *
 * @ORM\Table(name="eb_nota_credito", indexes={@ORM\Index(name="FK_NOTA_CREDITO_STATUS_NOTA_idx", columns={"id_status_nota"}), @ORM\Index(name="ID_NOTA_CREDITO_CHASSIS", columns={"chassis"})})
 * @ORM\Entity
 */
class EbNotaCredito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_nota_credito", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotaCredito;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=50, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="chassis", type="string", length=255, nullable=false)
     */
    private $chassis;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="string", length=45, nullable=true)
     */
    private $valor;

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
     * @ORM\ManyToMany(targetEntity="EbProduto", mappedBy="idNotaCredito")
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
     * Get idNotaCredito
     *
     * @return integer 
     */
    public function getIdNotaCredito()
    {
        return $this->idNotaCredito;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbNotaCredito
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
     * Set chassis
     *
     * @param string $chassis
     * @return EbNotaCredito
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
     * @param string $valor
     * @return EbNotaCredito
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
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbNotaCredito
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
     * @return EbNotaCredito
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
     * @return EbNotaCredito
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
		return $this->idNotaCredito;
	}

	public function __toString()
	{
		return $this->chassis;
	}

}
