<?php

//include 'conexao.php';

class Carrinho_produtoBD
{
   

    public static function inserirCarrinhoProduto($id_produto, $quantidade)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO carrinho_produto (id_produto, quantidade) 
                               VALUES(:id_produto, :quantidade)');

        $stmt->execute(array(
            ':id_produto' => $id_produto,
            ':quantidade' => $quantidade
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarCarrinhoProduto($id)
    {
        $pdo = getConexao();
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM carrinho_produto WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public static function atualizarCarrinhoProduto($id, $quantidade)
    {
        $pdo = getConexao();

        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE carrinho_produto SET quantidade = :quantidade WHERE id = :id");

            $stmt->execute(array(
                ':id' => $id,
                ':quantidade' => $quantidade
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function allCarrinhoProduto()
    {
        $pdo = getConexao();

        $resultado = $pdo->query("SELECT * FROM carrinho_produto");

        return $resultado;
    }

}