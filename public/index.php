<?php

require_once __DIR__.'/../bootstrap.php';

use FT\Sistema\Controller\ProdutoController;
use FT\Sistema\Controller\ProdutoAPIController;

$produtosApi = new ProdutoAPIController();
$app->mount('/', $produtosApi->getController($app));

$produtos = new ProdutoController();
$app->mount('/', $produtos->getController($app));

$app->run();

