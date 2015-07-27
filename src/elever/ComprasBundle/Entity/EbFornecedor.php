<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbFornecedor
 *
 * @ORM\Table(name="eb_fornecedor")
 * @ORM\Entity
 */
class EbFornecedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fornecedor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFornecedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=150, nullable=true)
     */
    private $nome;



    /**
     * Get idFornecedor
     *
     * @return integer 
     */
    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return EbFornecedor
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
}
