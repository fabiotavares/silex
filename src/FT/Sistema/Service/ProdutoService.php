<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 06/11/14
 * Time: 18:52
 */

namespace FT\Sistema\Service;

use FT\Sistema\Entity\Produto;
use FT\Sistema\Mapper\ProdutoMapper;

class ProdutoService
{
    private $produto;
    private $produtoMapper;

    public function __construct(Produto $produto, ProdutoMapper $produtoMapper)
    {
        $this->produto = $produto;
        $this->produtoMapper = $produtoMapper;
    }

    public function insert(array $data)
    {
        $this->produto->setId($data['id']);
        $this->produto->setNome($data['nome']);
        $this->produto->setDescricao($data['descricao']);
        $this->produto->setValor($data['valor']);

        $result = $this->produtoMapper->insert($this->produto);

        return $result;
    }
} 