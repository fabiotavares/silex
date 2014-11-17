<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 17/11/14
 * Time: 13:42
 */

namespace FT\Sistema\Controller;

use FT\Sistema\Interfaces\iProdutoAPIController;
use FT\Sistema\Entity\Produto;
use FT\Sistema\Mapper\ProdutoMapper;
use FT\Sistema\Service\ProdutoService;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class ProdutoAPIController implements iProdutoAPIController
{
    public function rotas(Application $app)
    {
        $produtoControllerApi = $app['controllers_factory'];

        $app['produtoService'] = function() {
            $produtoEntity = new Produto();
            $produtoMapper = new ProdutoMapper();
            $produtoService = new ProdutoService($produtoEntity, $produtoMapper);

            return $produtoService;
        };

        //-----------------------------------------------------------------------------

        $produtoControllerApi->get('/api/produtos', function() use ($app) {

            $produtos = $app['produtoService']->fetchAll();
            return $app->json($produtos, 200);

        });

        //-----------------------------------------------------------------------------

        $produtoControllerApi->get('/api/produtos/{id}', function($id) use ($app) {

            $produto = $app['produtoService']->fetch($id);
            if($produto) {
                return $app->json($produto, 200);
            } else {
                return $app->json(['ERRO' => 'Erro ao localizar produto!'], 404);
            }

        });

        //-----------------------------------------------------------------------------

        $produtoControllerApi->post('/api/produtos', function(Request $request) use ($app) {

            //insere novo produto no banco de dados
            $dados['nome'] = $request->get('nome');
            $dados['valor'] = $request->get('valor');
            $dados['descricao'] = $request->get('descricao');
            if($app['produtoService']->insert($dados)) {
                return $app->json(['SUCESSO' => 'Produto cadastrado com sucesso!'], 200);
            } else {
                return $app->json(['ERRO' => 'Erro ao localizar produto!'], 404);
            }

        });

        //-----------------------------------------------------------------------------

        $produtoControllerApi->put('/api/produtos/{id}', function($id, Request $request) use ($app) {

            $produto = $app['produtoService']->fetch($id);
            if($produto) {
                $dados['id'] = $id;
                $dados['nome'] = $request->get('nome');
                $dados['valor'] = $request->get('valor');
                $dados['descricao'] = $request->get('descricao');

                if($app['produtoService']->update($dados)) {
                    return $app->json(['SUCESSO' => 'Produto atualizado com sucesso!'], 200);
                } else {
                    return $app->json(['ERRO' => 'Erro ao atualizar produto!'], 404);
                }
            } else {
                return $app->json(['ERRO' => 'Erro ao localizar produto!'], 404);
            }

        });

        //-----------------------------------------------------------------------------

        $produtoControllerApi->delete('/api/produtos/{id}', function($id) use ($app) {

            $produto = $app['produtoService']->fetch($id);
            if($produto) {
                if($app['produtoService']->delete($id)) {
                    return $app->json(['SUCESSO' => 'Produto deletado com sucesso!'], 200);
                } else {
                    return $app->json(['ERRO' => 'Erro ao deletar produto!'], 404);
                }
            } else {
                return $app->json(['ERRO' => 'Erro ao localizar produto!'], 404);
            }

        });

        return $produtoControllerApi;
    }
} 