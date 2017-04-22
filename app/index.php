<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';

$app = new \Slim\App;

/**
 * Dance Dance Dance
 * @var string
 */
$app->get('/', function (Request $request, Response $response) use ($app) {
    $response->getBody()->write("<img src='https://www.askideas.com/media/36/Slow-Dancing-Boy-Funny-Gif-Picture.gif' />");
    return $response;
});
/**
 * Pega o hostname da máquina
 */
$app->get('/whoami', function (Request $request, Response $response) {
    $response->getBody()->write(gethostname());
    return $response;
});
/**
 * Pega o IP da máquina
 */
$app->get('/ip', function (Request $request, Response $response) {
    $response->getBody()->write(getHostByName(getHostName()));
    return $response;
});

$app->run();