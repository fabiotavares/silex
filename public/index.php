<?php

define('CLASS_DIR', '../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

require_once __DIR__.'/../bootstrap.php';

use FT\Clientes;

$app->get('/', function() {

    return "<a href='http://localhost:8888/clientes'>Clique aqui para exibir os clientes.</a>";

});

$app->get('/clientes', function() use ($app) {

    $clientes = new Clientes();

    return $app->json($clientes->getClientes(), 200);
});

$app->run();

