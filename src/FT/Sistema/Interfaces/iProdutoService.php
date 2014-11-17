<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 17/11/14
 * Time: 13:42
 */

namespace FT\Sistema\Interfaces;

interface iProdutoService
{
    function fetchAll();
    function fetch($id);
    function delete($id);
    function update(array $data);
    function insert(array $data);
} 