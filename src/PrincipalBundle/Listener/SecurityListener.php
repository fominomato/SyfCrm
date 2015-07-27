<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 24/06/2015
 * Time: 16:50
 */

namespace PrincipalBundle\Listener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;
use \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityListener
{
	private $security;

	private $session;

	private $em;

	/**
	 * Constructs a new instance of SecurityListener.
	 *
	 * @param SecurityContext $security The security context
	 * @param Session $session The session
	 */
	public function __construct (SecurityContext $security, Session $session, EntityManager $em)
	{
		$this->security = $security;
		$this->session = $session;
		$this->em = $em;
	}


	/**
	 * Invoked after a successful login.
	 *
	 * @param InteractiveLoginEvent $event The event
	 */
	public function onSecurityInteractiveLogin (InteractiveLoginEvent $event)
	{
		/**
		 * @var \PrincipalBundle\Entity\EbUsuario $user
		 */
		$user = $this->security->getToken()->getUser();

        /**
         * @var \PrincipalBundle\Entity\EbPerfil $perfil
         */
        foreach ($user->getIdPerfil() as $perfil) {
            $user->addRole('ROLE_' . strtoupper($perfil->getNome()));
        }
		$token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
		$this->security->setToken($token);
	}
}