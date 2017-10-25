<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/database/DatabaseAccess.php';
require '../src/utils/ResponseUtils.php';

$app = new \Slim\App;

/**
 * Register all the routes/end points
 */
require '../src/routes/users.php';
$app->run();