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
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function fetchAll()
    {
        $sql = "SELECT id, nome, descricao, Concat('R$ ', Replace(Replace(Replace(Format(valor, 2), '.', '|'), ',', '.'), '|', ',')) as valor FROM produtos;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function fetch($id)
    {
        $sql = "SELECT * FROM produtos WHERE id = :id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM produtos WHERE id = :id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("id", $id);
        $stmt->execute();

        return true;
    }

    public function update(Produto $produto)
    {
        $sql = "UPDATE produtos SET nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $produto->getNome());
        $stmt->bindValue("valor", $produto->getValor());
        $stmt->bindValue("descricao", $produto->getDescricao());
        $stmt->bindValue("id", $produto->getId());
        $stmt->execute();

        return true;
    }

    public function insert(Produto $produto)
    {
        $sql = "INSERT INTO produtos (nome, valor, descricao) VALUES (:nome, :valor, :descricao);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue("nome", $produto->getNome());
        $stmt->bindValue("valor", $produto->getValor());
        $stmt->bindValue("descricao", $produto->getDescricao());
        $stmt->execute();

        return true;
    }
} 