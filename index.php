<?php
	session_start();
	$db = new PDO("mysql:host = localhost; dbname=blockchain", "root", "root");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	require 'config/config.php';
	require 'lib/validation.php';
	require 'models/User.php';
	require 'models/request.php';
	require 'models/blockchainAPI.php';
	require 'vendor/autoload.php';


	$app = new \Slim\Slim(array(
		'view' => new \Slim\Views\Twig()
		));

	$view = $app -> view();

	$view -> parserOptions = array (
		'debug' => true,
		'cache' => 'cache'
		);

	$view -> parserExtensions = array(
		new \Slim\Views\TwigExtension()
		);

	$loader = new Twig_Loader_Filesystem('views');
	$twig = new Twig_Environment($loader);
/*don't require these till $app and $twig are defined*/
	require 'route/user.php';
	require 'route/app.php';

	$app->run();
	
?>