<?php

namespace elever\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbProdutoNotificacao
 *
 * @ORM\Table(name="eb_produto_notificacao", indexes={@ORM\Index(name="FK_PRODUTO_NOTIFICACAO_PRODUTO_idx", columns={"id_produto"}), @ORM\Index(name="FK_PRODUTO_NOTIFICACAO_USUARIO_idx", columns={"id_usuario_criador"}), @ORM\Index(name="FK_PRODUTO_NOTIFICACAO_USUARIO_RESPONSAVEL", columns={"id_usuario_responsavel"})})
 * @ORM\Entity
 */
class EbProdutoNotificacao
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_produto_notificacao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProdutoNotificacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_notificacao", type="datetime", nullable=false)
     */
    private $dtNotificacao;

    /**
     * @var string
     *
     * @ORM\Column(name="mensagem", type="text", nullable=false)
     */
    private $mensagem;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ativo", type="boolean", nullable=true)
     */
    private $ativo =  true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_cadastro", type="datetime", nullable=true)
     */
    private $dtCadastro;

    /**
     * @var \EbProduto
     *
     * @ORM\ManyToOne(targetEntity="EbProduto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produto", referencedColumnName="id_produto")
     * })
     */
    private $idProduto;

    /**
     * @var \EbUsuario
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_criador", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioCriador;

    /**
     * @var \EbUsuario
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario_responsavel", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuarioResponsavel;



    /**
     * Get idProdutoNotificacao
     *
     * @return integer 
     */
    public function getIdProdutoNotificacao()
    {
        return $this->idProdutoNotificacao;
    }

    /**
     * Set dtNotificacao
     *
     * @param \DateTime $dtNotificacao
     * @return EbProdutoNotificacao
     */
    public function setDtNotificacao($dtNotificacao)
    {
        $this->dtNotificacao = $dtNotificacao;

        return $this;
    }

    /**
     * Get dtNotificacao
     *
     * @return \DateTime 
     */
    public function getDtNotificacao()
    {
        return $this->dtNotificacao;
    }

    /**
     * Set mensagem
     *
     * @param string $mensagem
     * @return EbProdutoNotificacao
     */
    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;

        return $this;
    }

    /**
     * Get mensagem
     *
     * @return string 
     */
    public function getMensagem()
    {
        return $this->mensagem;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return EbProdutoNotificacao
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
     * Set dtCadastro
     *
     * @param \DateTime $dtCadastro
     * @return EbProdutoNotificacao
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
     * Set idProduto
     *
     * @param \elever\ComprasBundle\Entity\EbProduto $idProduto
     * @return EbProdutoNotificacao
     */
    public function setIdProduto(\elever\ComprasBundle\Entity\EbProduto $idProduto = null)
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

    /**
     * Set idUsuarioCriador
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuarioCriador
     * @return EbProdutoNotificacao
     */
    public function setIdUsuarioCriador(\PrincipalBundle\Entity\EbUsuario $idUsuarioCriador = null)
    {
        $this->idUsuarioCriador = $idUsuarioCriador;

        return $this;
    }

    /**
     * Get idUsuarioCriador
     *
     * @return \PrincipalBundle\Entity\EbUsuario
     */
    public function getIdUsuarioCriador()
    {
        return $this->idUsuarioCriador;
    }

    /**
     * Set idUsuarioResponsavel
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuarioResponsavel
     * @return EbProdutoNotificacao
     */
    public function setIdUsuarioResponsavel(\PrincipalBundle\Entity\EbUsuario $idUsuarioResponsavel = null)
    {
        $this->idUsuarioResponsavel = $idUsuarioResponsavel;

        return $this;
    }

    /**
     * Get idUsuarioResponsavel
     *
     * @return \PrincipalBundle\Entity\EbUsuario
     */
    public function getIdUsuarioResponsavel()
    {
        return $this->idUsuarioResponsavel;
    }

	public function getId()
	{
		return $this->idProdutoNotificacao;
	}

	public function __toString()
	{
		return $this->mensagem;
	}

}
