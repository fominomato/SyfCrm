<?php

namespace PrincipalBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EbPerfilRepository extends EntityRepository
{

	public function getRoleById ($id_perfil)
	{
		return $this->createQueryBuilder("p")
            ->where("p.idPerfil = :perfil")
            ->setParameter("perfil", $id_perfil)
			->getQuery()
            ->getOneOrNullResult();
	}


	public function getRolesByIdUser ($user)
	{
		return $this->createQueryBuilder("p")
			->where("p.idUsuario = :usuario")
			->setParameter("usuario", $user)
			->getQuery()
			->getResult();
	}

}
