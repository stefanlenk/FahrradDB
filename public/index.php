<?php

use Application\Controller\Front;
use Application\Model\Request;
use Application\Model\Setup;

require_once(__DIR__ . '/../src/php/AutoLoad.php');

$setup = new Setup();
$parameters = array_merge($_GET, $_POST);
$method = $_SERVER['REQUEST_METHOD'];
$request = new Request($parameters, $method);
$controller = new Front($setup, $request);
$controller->handleRequest();
$response = $controller->getResponse();
$response->send();
