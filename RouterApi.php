<?php
require_once 'RouterClass.php';
require_once 'api/ApiBingoController.php';

// instacio el router
$router = new Router();

// armo la tabla de ruteo de la API REST
// $router->addRoute('obras', 'GET', 'ApiCommentController', 'Prueba');
$router->addRoute('ronda', 'GET', 'ApiBingoController', 'GetSessionState');
$router->addRoute('carton', 'GET', 'ApiBingoController', 'GetBingoCards');
$router->addRoute('numero', 'GET', 'ApiBingoController', 'GetLastNumber');
$router->addRoute('usuario', 'GET', 'ApiBingoController', 'GetUserData');

$router->addRoute('carton/:ID', 'POST', 'ApiBingoController', 'MarkOwnerBingoCard');




$router->addRoute('obras/:ID', 'GET', 'ApiBingoController', 'GetCommentsByArtworkId');
$router->addRoute('obras/:ID', 'POST', 'ApiBingoController', 'InsertComment');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiBingoController', 'DeleteComment');

// $router->addRoute('obras', 'POST', 'ApiCommentController', 'InsertTask');


// $router->addRoute('obras/:ID', 'PUT', 'ApiCommentController', 'UpdateTask');


 //run
 $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 