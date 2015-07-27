<?php

namespace PrincipalBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Component\Security\Core\Role\RoleInterface;
use PrincipalBundle\Entity\EbUsuario;


class PerfilUserMapper implements RoleInterface
{

	private $em;
	private $logger;

	public function __construct (EntityManager $em)
	{
		$this->em = $em;
	}

	/**
	 * Carregar os papeis para um usuario no momento do login
	 * @param $user
	 * @return mixed
	 */
	public function getRoleByUser (EbUsuario $user)
	{

		return $this->em->getRepository('PrincipalBundle:EbPerfil')
			->getRoleById($user->getIdPerfil());
	}

	public function setLogger (Logger $logger)
	{
		$this->logger = $logger;
	}

	private function logInfo ($msg)
	{
		if ($this->logger) {
			$this->logger->info($msg);
		}
	}
}
