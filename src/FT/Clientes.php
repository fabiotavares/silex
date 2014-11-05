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
        $cliente = new Cliente();
        $cliente->setNome('Fábio Tavares')
                ->setEmail('fabio.tavares@gmail.com')
                ->setDocumento('123.456.789-00');
        $this->add($cliente);

        $cliente = new Cliente();
        $cliente->setNome('Raquel Garcia')
            ->setEmail('raquel.garcia@gmail.com')
            ->setDocumento('333.444.555-11');
        $this->add($cliente);

        $cliente = new Cliente();
        $cliente->setNome('Rafael Pinheiro')
            ->setEmail('rafel.pinheiro@hotmail.com')
            ->setDocumento('123.444.567-88');
        $this->add($cliente);

        $cliente = new Cliente();
        $cliente->setNome('Gabriela Tavares')
            ->setEmail('gabriela.tavares@yahoo.com')
            ->setDocumento('444.234.765-23');
        $this->add($cliente);

        $cliente = new Cliente();
        $cliente->setNome('Gustavo Deboçan')
            ->setEmail('gustavo.debocan@gmail.com')
            ->setDocumento('543.543.222-77');
        $this->add($cliente);

        $cliente = new Cliente();
        $cliente->setNome('Papelaria Danilo')
            ->setEmail('papelaria.danilo@gmail.com')
            ->setDocumento('99.999.999/9999-99');
        $this->add($cliente);
    }

    public function add(Cliente $cliente)
    {
        $this->clientes[] = $cliente;
    }

    public function getClientesJson()
    {
        $indent = '&nbsp&nbsp&nbsp&nbsp';
        $saida = "{<br>";

        for($i = 0; $i < count($this->clientes); $i++) {

            $saida .= $indent."{<br>";
            $saida .= $indent.$indent."\"nome\": \"{$this->clientes[$i]->getNome()}\",<br>";
            $saida .= $indent.$indent."\"email\": \"{$this->clientes[$i]->getEmail()}\",<br>";
            $saida .= $indent.$indent."\"documento\": \"{$this->clientes[$i]->getDocumento()}\"<br>";
            $saida .= $indent."},<br>";
        }

        $saida .= "}";

        return $saida;
    }

} 