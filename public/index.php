<?php

require_once __DIR__.'/../bootstrap.php';

use FT\Sistema\Entity\Produto;
use FT\Sistema\Mapper\ProdutoMapper;
use FT\Sistema\Service\ProdutoService;

require_once(__DIR__.'/../src/FT/Sistema/Uteis/conexao.php');

//service container do Silex --------------------------------------------------

$app['produtoService'] = function() use($conn) {
    $produtoEntity = new Produto();
    $produtoMapper = new ProdutoMapper($conn);
    $produtoService = new ProdutoService($produtoEntity, $produtoMapper);

    return $produtoService;
};

//-----------------------------------------------------------------------------
//Fase 1:

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
})->bind('clientes');

//-----------------------------------------------------------------------------
//Fase 2 e 3:

$app->get('/', function() use ($app) {
    return $app->redirect('produtos');
})->bind('index');

//-----------------------------------------------------------------------------

$app->get('/produtos', function() use ($app) {
    $produtos = $app['produtoService']->fetchAll();
    return $app['twig']->render('produtos.twig', ['produtos'=>$produtos]);
})->bind('produtos');

//-----------------------------------------------------------------------------

$app->get('/produto/novo', function() use ($app) {

        return $app['twig']->render('novo_produto.twig', []);

})->bind('create');

//-----------------------------------------------------------------------------

$app->post('/produto/novo', function() use ($app) {

    if(isset($_REQUEST['insercaoConfirmada'])) {

        $app['produtoService']->insert($_REQUEST);

    }
    return $app->redirect('/produtos');

})->bind('inserirProduto');

//-----------------------------------------------------------------------------

$app->post('/produto/editar', function() use ($app) {
    if(isset($_REQUEST['editarProduto'])) {

        $produto = $app['produtoService']->fetch($_REQUEST['produtoId']);
        return $app['twig']->render('editar_produto.twig', ['produto'=>$produto]);

    } elseif(isset($_REQUEST['edicaoConfirmada'])) {
        $app['produtoService']->update($_REQUEST);
        return $app->redirect('/produtos');
    }
})->bind('editarProduto');

//-----------------------------------------------------------------------------

$app->post('/produto/excluir', function() use ($app) {

    if(isset($_REQUEST['excluirProduto'])) {
        $produto = $app['produtoService']->fetch($_REQUEST['produtoId']);
        return $app['twig']->render('excluir_produto.twig', ['produto'=>$produto]);

    } elseif(isset($_REQUEST['exclusaoConfirmada'])) {
        $app['produtoService']->delete($_REQUEST['produtoId']);
        return $app->redirect('/produtos');
    }
})->bind('excluirProduto');

//-----------------------------------------------------------------------------

$app->run();

