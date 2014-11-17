<?php

require_once __DIR__.'/../bootstrap.php';

$produtos = new \FT\Sistema\Controller\ProdutoController();
$app->mount('/', $produtos->rotas($app));

$produtosApi = new \FT\Sistema\Controller\ProdutoAPIController();
$app->mount('/', $produtosApi->rotas($app));

$app->run();

