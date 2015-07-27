<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EbUsuarioEscala
 *
 * @ORM\Table(name="eb_usuario_escala", indexes={@ORM\Index(name="fk_eb_usuario_escala_usuario", columns={"id_usuario"})})
 * @ORM\Entity
 */
class EbUsuarioEscala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario_escala", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuarioEscala;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="dia0_i", type="string", length=5, nullable=true)
     */
    private $dia0I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia0_f", type="string", length=5, nullable=true)
     */
    private $dia0F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia1_i", type="string", length=5, nullable=true)
     */
    private $dia1I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia1_f", type="string", length=5, nullable=true)
     */
    private $dia1F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia2_i", type="string", length=5, nullable=true)
     */
    private $dia2I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia2_f", type="string", length=5, nullable=true)
     */
    private $dia2F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia3_i", type="string", length=5, nullable=true)
     */
    private $dia3I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia3_f", type="string", length=5, nullable=true)
     */
    private $dia3F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia4_i", type="string", length=5, nullable=true)
     */
    private $dia4I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia4_f", type="string", length=5, nullable=true)
     */
    private $dia4F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia5_i", type="string", length=5, nullable=true)
     */
    private $dia5I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia5_f", type="string", length=5, nullable=true)
     */
    private $dia5F;

    /**
     * @var string
     *
     * @ORM\Column(name="dia6_i", type="string", length=5, nullable=true)
     */
    private $dia6I;

    /**
     * @var string
     *
     * @ORM\Column(name="dia6_f", type="string", length=5, nullable=true)
     */
    private $dia6F;

    /**
     * @var \PrincipalBundle\Entity\EbUsuario
     *
     * @ORM\ManyToOne(targetEntity="PrincipalBundle\Entity\EbUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;



    /**
     * Get idUsuarioEscala
     *
     * @return integer 
     */
    public function getIdUsuarioEscala()
    {
        return $this->idUsuarioEscala;
    }

    /**
     * Get tipo
     *
     * @return string
     */
	public function getTipo ()
    {
	    return $this->tipo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return EbUsuarioEscala
     */
	public function setTipo ($tipo)
    {
	    $this->tipo = $tipo;

	    return $this;
    }

    /**
     * Get dia0I
     *
     * @return string
     */
	public function getDia0I ()
    {
	    return $this->dia0I;
    }

    /**
     * Set dia0I
     *
     * @param string $dia0I
     * @return EbUsuarioEscala
     */
	public function setDia0I ($dia0I)
    {
	    $this->dia0I = $dia0I;

	    return $this;
    }

    /**
     * Get dia0F
     *
     * @return string
     */
	public function getDia0F ()
    {
	    return $this->dia0F;
    }

    /**
     * Set dia0F
     *
     * @param string $dia0F
     * @return EbUsuarioEscala
     */
	public function setDia0F ($dia0F)
    {
	    $this->dia0F = $dia0F;

	    return $this;
    }

    /**
     * Get dia1I
     *
     * @return string
     */
	public function getDia1I ()
    {
	    return $this->dia1I;
    }

    /**
     * Set dia1I
     *
     * @param string $dia1I
     * @return EbUsuarioEscala
     */
	public function setDia1I ($dia1I)
    {
	    $this->dia1I = $dia1I;

	    return $this;
    }

    /**
     * Get dia1F
     *
     * @return string
     */
	public function getDia1F ()
    {
	    return $this->dia1F;
    }

    /**
     * Set dia1F
     *
     * @param string $dia1F
     * @return EbUsuarioEscala
     */
	public function setDia1F ($dia1F)
    {
	    $this->dia1F = $dia1F;

	    return $this;
    }

    /**
     * Get dia2I
     *
     * @return string
     */
	public function getDia2I ()
    {
	    return $this->dia2I;
    }

    /**
     * Set dia2I
     *
     * @param string $dia2I
     * @return EbUsuarioEscala
     */
	public function setDia2I ($dia2I)
    {
	    $this->dia2I = $dia2I;

	    return $this;
    }

    /**
     * Get dia2F
     *
     * @return string
     */
	public function getDia2F ()
    {
	    return $this->dia2F;
    }

    /**
     * Set dia2F
     *
     * @param string $dia2F
     * @return EbUsuarioEscala
     */
	public function setDia2F ($dia2F)
    {
	    $this->dia2F = $dia2F;

	    return $this;
    }

    /**
     * Get dia3I
     *
     * @return string
     */
	public function getDia3I ()
    {
	    return $this->dia3I;
    }

    /**
     * Set dia3I
     *
     * @param string $dia3I
     * @return EbUsuarioEscala
     */
	public function setDia3I ($dia3I)
    {
	    $this->dia3I = $dia3I;

	    return $this;
    }

    /**
     * Get dia3F
     *
     * @return string
     */
	public function getDia3F ()
    {
	    return $this->dia3F;
    }

    /**
     * Set dia3F
     *
     * @param string $dia3F
     * @return EbUsuarioEscala
     */
	public function setDia3F ($dia3F)
    {
	    $this->dia3F = $dia3F;

	    return $this;
    }

    /**
     * Get dia4I
     *
     * @return string
     */
	public function getDia4I ()
    {
	    return $this->dia4I;
    }

    /**
     * Set dia4I
     *
     * @param string $dia4I
     * @return EbUsuarioEscala
     */
	public function setDia4I ($dia4I)
    {
	    $this->dia4I = $dia4I;

	    return $this;
    }

    /**
     * Get dia4F
     *
     * @return string
     */
	public function getDia4F ()
    {
	    return $this->dia4F;
    }

    /**
     * Set dia4F
     *
     * @param string $dia4F
     * @return EbUsuarioEscala
     */
	public function setDia4F ($dia4F)
    {
	    $this->dia4F = $dia4F;

	    return $this;
    }

    /**
     * Get dia5I
     *
     * @return string
     */
	public function getDia5I ()
    {
	    return $this->dia5I;
    }

    /**
     * Set dia5I
     *
     * @param string $dia5I
     * @return EbUsuarioEscala
     */
	public function setDia5I ($dia5I)
    {
	    $this->dia5I = $dia5I;

	    return $this;
    }

    /**
     * Get dia5F
     *
     * @return string
     */
	public function getDia5F ()
    {
	    return $this->dia5F;
    }

    /**
     * Set dia5F
     *
     * @param string $dia5F
     * @return EbUsuarioEscala
     */
	public function setDia5F ($dia5F)
    {
	    $this->dia5F = $dia5F;

	    return $this;
    }

    /**
     * Get dia6I
     *
     * @return string
     */
	public function getDia6I ()
    {
	    return $this->dia6I;
    }

    /**
     * Set dia6I
     *
     * @param string $dia6I
     * @return EbUsuarioEscala
     */
	public function setDia6I ($dia6I)
    {
	    $this->dia6I = $dia6I;

	    return $this;
    }

    /**
     * Get dia6F
     *
     * @return string
     */
	public function getDia6F ()
    {
	    return $this->dia6F;
    }

    /**
     * Set dia6F
     *
     * @param string $dia6F
     * @return EbUsuarioEscala
     */
	public function setDia6F ($dia6F)
    {
	    $this->dia6F = $dia6F;

	    return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \PrincipalBundle\Entity\EbUsuario
     */
	public function getIdUsuario ()
    {
	    return $this->idUsuario;
    }

    /**
     * Set idUsuario
     *
     * @param \PrincipalBundle\Entity\EbUsuario $idUsuario
     * @return EbUsuarioEscala
     */
	public function setIdUsuario (\PrincipalBundle\Entity\EbUsuario $idUsuario = null)
    {
	    $this->idUsuario = $idUsuario;

	    return $this;
    }


}
