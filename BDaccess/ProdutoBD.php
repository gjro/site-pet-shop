<?php

//include 'conexao.php';

class ProdutoBD
{
  

    public static function inserirProduto($imagem, $nome, $categoria, $descricao, $preco, $quantidade)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO produto (imagem, nome, categoria, descricao, preco, quantidade_estoque) 
                               VALUES(:imagem, :nome, :categoria, :descricao, :preco, :quantidade_estoque)');

        $stmt->execute(array(
            ':imagem' => "img/".$imagem,
            ':nome' => $nome,
            ':categoria' => $categoria,
            ':descricao' => $descricao,
            ':preco' => $preco,
            ':quantidade_estoque' => $quantidade
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarProduto($id)
    {
        $pdo = getConexao();
        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM produto WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));
        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public static function allProduto()
    {
        $pdo = getConexao();
        
        $resultado = $pdo->query("SELECT * FROM produto;");

        return $resultado;
    }

    public static function buscaProduto($id,$param)
    {
        $pdo = getConexao();

        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $resultado = $pdo->prepare("SELECT * FROM produto WHERE id = :id;");

            $resultado->execute(array(
                ':id' => $id
            ));


            foreach ($resultado as $row)
            {
                return $row[$param];
            }

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function atualizarProduto($id, $imagem, $descricao, $categoria, $preco)
    {
        $pdo = getConexao();

        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE produto SET imagem = :imagem, descricao = :descricao, categoria = :categoria, preco = :preco WHERE id = :id");

            $stmt->execute(array(
                ':id' => $id,
                ':imagem' => "img/".$imagem,
                ':descricao' => $descricao,
                ':categoria' => $categoria,
                ':preco' => $preco
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
