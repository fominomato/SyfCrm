<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbProdutoAnexo
 *
 * @ORM\Table(name="eb_produto_anexo")
 * @ORM\Entity
 */
class EbProdutoAnexo
{
    /**
     * @var string
     *
     * @ORM\Column(name="anexo", type="text", nullable=true)
     */
    private $anexo;

    /**
     * @var \EbProduto
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="EbProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    private $idProduto;



    /**
     * Set anexo
     *
     * @param string $anexo
     * @return EbProdutoAnexo
     */
    public function setAnexo($anexo)
    {
        $this->anexo = $anexo;

        return $this;
    }

    /**
     * Get anexo
     *
     * @return string 
     */
    public function getAnexo()
    {
        return $this->anexo;
    }

    /**
     * Set idProduto
     *
     * @param \elever\ComprasBundle\Entity\EbProduto $idProduto
     * @return EbProdutoAnexo
     */
    public function setIdProduto(\elever\ComprasBundle\Entity\EbProduto $idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get idProduto
     *
     * @return \elever\ComprasBundle\Entity\EbProduto 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }


	public function __toString()
	{
		return $this->anexo;
	}

}
