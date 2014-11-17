<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 06/11/14
 * Time: 18:49
 */

namespace FT\Sistema\Mapper;

use FT\Sistema\Entity\Produto;
use FT\Sistema\Interfaces\iProdutoMapper;
use FT\Sistema\Database\Conexao;

class ProdutoMapper implements iProdutoMapper
{
    public function fetchAll()
    {
        try{
            $conn = Conexao::getDb();
            $sql = "SELECT id, nome, descricao, Concat('R$ ', Replace(Replace(Replace(Format(valor, 2), '.', '|'), ',', '.'), '|', ',')) as valor FROM produtos;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
    }

    public function fetch($id)
    {
        try{
            $conn = Conexao::getDb();
            $sql = "SELECT * FROM produtos WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue("id", $id, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            echo "ERROR: Unable to list the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
    }

    public function delete($id)
    {
        try{
            $conn = Conexao::getDb();
            $sql = "DELETE FROM produtos WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue("id", $id, \PDO::PARAM_INT);

            return $stmt->execute();

        } catch (\PDOException $e) {
            echo "ERROR: Unable to delete the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
    }

    public function update(Produto $produto)
    {
        try{
            $conn = Conexao::getDb();
            $sql = "UPDATE produtos SET nome = :nome, valor = :valor, descricao = :descricao WHERE id = :id;";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue("nome", $produto->getNome(), \PDO::PARAM_STR);
            $stmt->bindValue("valor", $produto->getValor(), \PDO::PARAM_STR);
            $stmt->bindValue("descricao", $produto->getDescricao(), \PDO::PARAM_STR);
            $stmt->bindValue("id", $produto->getId(), \PDO::PARAM_INT);

            return $stmt->execute();

        } catch (\PDOException $e) {
            echo "ERROR: Unable to update the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
    }

    public function insert(Produto $produto)
    {
        try{
            $conn = Conexao::getDb();
            $sql = "INSERT INTO produtos (nome, valor, descricao) VALUES (:nome, :valor, :descricao);";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue("nome", $produto->getNome(), \PDO::PARAM_STR);
            $stmt->bindValue("valor", $produto->getValor(), \PDO::PARAM_STR);
            $stmt->bindValue("descricao", $produto->getDescricao(), \PDO::PARAM_STR);

            return $stmt->execute();

        } catch (\PDOException $e) {
            echo "ERROR: Unable to insert the data in the database!";
            die("Code: {$e->getCode()} <br> Message: {$e->getMessage()} <br>  File: {$e->getFile()} <br> Line: {$e->getLine()}");
        }
    }
} 