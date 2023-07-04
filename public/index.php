<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ClientController;

// Instanciamos el Router
$router = new Router();


// Aqui van las rutas
$router->get('/', [ClientController::class, 'index']);
// $router->post('/', [ClientController::class, 'index']);


// API's
$router->get('/api/get-client-data', [ClientController::class, 'getClientData']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();