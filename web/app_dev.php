<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

$server = "";
if (isset($_SERVER['SERVER_NAME'])) {
	$auxData = preg_split("/\./", strtolower($_SERVER['SERVER_NAME']));
	if (count($auxData > 0))
		$server = strtolower($auxData[0]);

	if (preg_match("/127\.0\.0\.1/", $_SERVER['SERVER_NAME'])) {
		$server = "localhost";
	}
}


// $loader = require_once __DIR__.'/../app/bootstrap.php.cache';
$loader = require_once __DIR__.'/../app/autoload.php';
require_once __DIR__.'/../app/AppKernel.php';
Debug::enable();

$kernel = new AppKernel($server, true);
// $kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
