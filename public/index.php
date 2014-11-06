<?php

require_once __DIR__.'/../bootstrap.php';

use FT\Sistema\Entity\Produto;
use FT\Sistema\Mapper\ProdutoMapper;
use FT\Sistema\Service\ProdutoService;

//service container do Silex --------------------------------------------------

$app['produtoService'] = function() {

    $produtoEntity = new Produto();
    $produtoMapper = new ProdutoMapper();
    $produtoService = new ProdutoService($produtoEntity, $produtoMapper);

    return $produtoService;
};

//Definição dos serviços ------------------------------------------------------

$app->get('/', function() {

    return "";

});

$app->get('/clientes', function() use ($app) {

    $clientes = [
        ['nome' => 'Fabio Tavares', 'email' => 'fabio.tavares@gmail.com', 'cpf' => '123.456.789-00'],
        ['nome' => 'Raquel Garcia', 'email' => 'raquel.garcia@gmail.com', 'cpf' => '333.444.555-11'],
        ['nome' => 'Rafael Pinheiro', 'email' => 'rafel.pinheiro@hotmail.com', 'cpf' => '123.444.567-88'],
        ['nome' => 'Gabriela Tavares', 'email' => 'gabriela.tavares@yahoo.com', 'cpf' => '444.234.765-23'],
        ['nome' => 'Gustavo Debocan', 'email' => 'gustavo.debocan@gmail.com', 'cpf' => '543.543.222-77'],
        ['nome' => 'Papelaria Danilo', 'email' => 'papelaria.danilo@gmail.com', 'cnpj' => '99.999.999/9999-99']
    ];

    return $app->json($clientes, 200);
});

$app->get('/produto', function() use ($app) {

    $dados = [
        'id' => 1,
        'nome' => 'Produto X',
        'descricao' => 'Produto X ....',
        'valor' => 290.90
    ];

    $result = $app['produtoService']->insert($dados);

    return $app->json($result, 200);
});

//-----------------------------------------------------------------------------

$app->run();

