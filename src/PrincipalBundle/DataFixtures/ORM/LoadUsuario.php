<?php

namespace PrincipalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PrincipalBundle\Entity\EbUsuario;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use PrincipalBundle\Entity\EbPerfil;
use Symfony\Component\Validator\Constraints\Date;

class LoadUsuario implements FixtureInterface, ContainerAwareInterface {

    private $container;
    
    public function load(ObjectManager $manager) {


        $date = new \DateTime("NOW");

        //operacional
        $perfil = $manager->getRepository("PrincipalBundle:EbPerfil")->getRoleById("2");

        $user = new EbUsuario();
        $user->setNome("Leads User");
        $user->setPassword($this->encodePassword($user, "user"));
        $user->setAtivo(true);
        $user->setEmail("user@leads.com");
        $user->setImagen("bundles/principal/images/avatar.png");
        $user->addIdPerfil($perfil);
        $user->setDtCadastro($date);
        $manager->persist($user);

	    //super
        $perfil = $manager->getRepository("PrincipalBundle:EbPerfil")->getRoleById(1);

	    $admin = new EbUsuario();
        $admin->setNome("Leads Adm");
        $admin->setPassword($this->encodePassword($admin, "admin"));
	    $admin->setAtivo(true);
        $admin->setImagen("bundles/principal/images/avatar.png");
        $admin->setEmail("leads@leads.com");
        $admin->addIdPerfil($perfil);
        $admin->setDtCadastro($date);
        $manager->persist($admin);

        $manager->flush();
    }

	private function encodePassword ($user, $plainPassword)
	{
		$encoder = $this->container->get("security.encoder_factory")
			->getEncoder($user);

		return $encoder->encodePassword($plainPassword, $user->getSalt());
	}
    
    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

}