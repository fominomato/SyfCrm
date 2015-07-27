<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 07/07/2015
 * Time: 10:48
 */

namespace PrincipalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ConfiguracaoController extends Controller
{
	/**
	 * @Route("/configuracao")
	 * @Template()
	 */
	public function indexAction ()
	{
		return array();
	}
}