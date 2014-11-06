<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 05/11/14
 * Time: 16:12
 */

namespace FT;


class Clientes
{
    private $clientes;

    public function __construct()
    {
        $this->add(['nome' => 'Fabio Tavares', 'email' => 'fabio.tavares@gmail.com', 'cpf' => '123.456.789-00']);
        $this->add(['nome' => 'Raquel Garcia', 'email' => 'raquel.garcia@gmail.com', 'cpf' => '333.444.555-11']);
        $this->add(['nome' => 'Rafael Pinheiro', 'email' => 'rafel.pinheiro@hotmail.com', 'cpf' => '123.444.567-88']);
        $this->add(['nome' => 'Gabriela Tavares', 'email' => 'gabriela.tavares@yahoo.com', 'cpf' => '444.234.765-23']);
        $this->add(['nome' => 'Gustavo Debocan', 'email' => 'gustavo.debocan@gmail.com', 'cpf' => '543.543.222-77']);
        $this->add(['nome' => 'Papelaria Danilo', 'email' => 'papelaria.danilo@gmail.com', 'cnpj' => '99.999.999/9999-99']);
    }

    public function add($cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function getClientes()
    {
        return $this->clientes;
    }

} 