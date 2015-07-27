<?php

namespace elever\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ComprasController extends Controller
{
	/**
	 * @Route("/compras")
	 * @Template()
	 */
	public function indexAction ()
	{
		return array();
	}
}
