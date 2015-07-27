<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new PrincipalBundle\PrincipalBundle(),
            new elever\HomeBundle\HomeBundle(),
	        new elever\ClienteBundle\ClienteBundle(),
            new elever\VendaBundle\VendaBundle(),
	        new elever\ComprasBundle\ComprasBundle(),
        );

	    $server = "";
	    if (isset($_SERVER['SERVER_NAME'])) {
		    $auxData = preg_split("/\./", strtolower($_SERVER['SERVER_NAME']));
		    if (count($auxData > 0))
			    $server = $auxData[0];

		    if (preg_match("/127\.0\.0\.1/", $_SERVER['SERVER_NAME'])) {
			    $server = "localhost";
		    }
	    }

	    if (in_array($this->getEnvironment(), array('dev', 'test', $server))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
	        $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
        }

        return $bundles;
    }

	public function init()
	{
		date_default_timezone_set( 'America/Sao_Paulo' );
		parent::init();
	}

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
	    $loader->load($this->getRootDir() . "/config/customer/{$this->getEnvironment()}/config_{$this->getEnvironment()}.yml");
    }
}
