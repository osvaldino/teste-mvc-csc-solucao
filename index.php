<?php

require_once './system/autoload.php';

ini_set('error_reporting', E_ALL);

$request = Http::getRequestedPath();

$routes = require_once './routes.php';
$args = $foundRoute = null;
foreach ($routes as $route) {
	if ($route->isMatched($request, $args)) {
		$foundRoute = $route;
		break;
	}
}

$className = $foundRoute->getController() . 'Controller';
$worker = new $className;

if (method_exists($worker, '__pre')) {
	call_user_func([$worker, '__pre']);
}

if (!method_exists($worker, $foundRoute->getMethod())) {
	die('CONTROLLER: Method not found.');
}
$methodName = $foundRoute->getMethod();
call_user_func_array([$worker, $methodName], $args);

if (method_exists($worker, '__post')) {
	call_user_func([$worker, '__post']);
}

$DATA = $worker->getData();

$headerView = './app/views/_global/header.php';
$footerView = './app/views/_global/footer.php';
$view = './app/views/' . $foundRoute->getController() . '/' . $foundRoute->getMethod() . '.php';

if (!file_exists($headerView)) {
	die('VIEW: Header file not found.');
}

if (!file_exists($view)) {
	die('VIEW: Main template file not found.');
}

if (!file_exists($footerView)) {
	die('VIEW: Footer file not found.');
}

$jsModule = sprintf('assets/js/modules/%s_%s.js', $foundRoute->getController(), $foundRoute->getMethod());
if (file_exists($jsModule)) {
	$DATA['JAVASCRIPT_MODULE'] = $jsModule;
}

require_once $headerView;
require_once $view;
require_once $footerView;
