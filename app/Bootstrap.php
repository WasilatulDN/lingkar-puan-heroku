<?php

use Phalcon\Mvc\Application;

class Bootstrap extends Application
{
	private function _registerServices()
	{
	$di = new \Phalcon\DI\FactoryDefault();

	$config = require APP_PATH. '/config/config.php';
	include_once APP_PATH. '/config/loader.php';
	include_once APP_PATH. '/config/services.php';
	include_once APP_PATH. '/config/routing.php';
	include_once BASE_PATH. '/vendor/autoload.php';

	$this->setDI($di);
	}

public function init()
	{
		date_default_timezone_set('Asia/Jakarta');
		
		$debug = new \Phalcon\Debug();
		$debug->listen();

		$this->_registerServices();
		
		echo $this->handle()->getContent();
	}
}