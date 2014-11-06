<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 06/11/14
 * Time: 18:49
 */

namespace FT\Sistema\Mapper;

use FT\Sistema\Entity\Produto;

class ProdutoMapper
{
    public function insert(Produto $produto)
    {
        return [
            'id' => 1,
            'nome' => 'Produto X',
            'descricao' => 'Produto X ....',
            'valor' => 290.90
        ];
    }
} 