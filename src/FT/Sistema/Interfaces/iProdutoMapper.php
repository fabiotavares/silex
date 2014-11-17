<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 17/11/14
 * Time: 13:41
 */

namespace FT\Sistema\Interfaces;

use FT\Sistema\Entity\Produto;

interface iProdutoMapper
{
    function fetchAll();
    function fetch($id);
    function delete($id);
    function update(Produto $produto);
    function insert(Produto $produto);
} 