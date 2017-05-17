<?php
use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaData;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Events\Manager as EventsManager;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();
/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
	$url = new UrlProvider();
	$url->setBaseUri($config->application->baseUri);
	return $url;
});


$di->set('view', function () use ($config) {

	$view = new View();

	$view->setViewsDir(APP_PATH . $config->application->viewsDir);

	$view->registerEngines(array(
		".volt" => 'volt'
	));

	return $view;
});

/**
 * Setting up volt
 */
$di->set('volt', function ($view, $di) {

	$volt = new VoltEngine($view, $di);

	// $volt->setOptions(array(
	// 	"compiledPath" => APP_PATH . "cache/volt/"
	// ));

	// $compiler = $volt->getCompiler();
	// $compiler->addFunction('is_a', 'is_a');

	return $volt;
}, true);

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
// $di->set('db', function () use ($config) {
// 	$dbclass = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
// 	return new $dbclass(array(
// 		"host"     => $config->database->host,
// 		"username" => $config->database->username,
// 		"password" => $config->database->password,
// 		"dbname"   => $config->database->name
// 	));
// });
$di->setShared('db', function() use ($config) {
    return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
        "host" => $config->database->host,
        "username" => $config->database->username,
        "password" => $config->database->password,
        "dbname" => $config->database->name
    ));
});
/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
	return new MetaData();
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('session', function () {
	$session = new SessionAdapter();
	$session->start();
	return $session;
});

use Phalcon\Mvc\Router\Annotations as RouterAnnotations;

$di->set('router', function () {
	$router = new Phalcon\Mvc\Router(false);

	return include "../app/routes/router.php";
});