<?php

//include 'conexao.php';

class ServicoBD
{
   

    public static function inserirServico($imagem, $nome, $descricao, $preco)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO servico (imagem, nome, descricao, preco) VALUES(:imagem, :nome, :descricao, :preco)');

        $stmt->execute(array(
            ':imagem' => 'img/'.$imagem,
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':preco' => $preco
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }

    
    public static function deletarServico($id)
    {
        $pdo = getConexao();
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM servico WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public static function atualizarServico($id, $imagem, $descricao, $preco)
    {
        $pdo = getConexao();
        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("UPDATE servico SET imagem = :imagem, descricao = :descricao, preco = :preco WHERE id = :id");

            $stmt->execute(array(
                ':id' => $id,
                ':imagem' => "img/".$imagem,
                ':descricao' => $descricao,
                ':preco' => $preco
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function allServico()
    {
        $pdo = getConexao();
        
        $resultado = $pdo->query("SELECT * FROM servico;");

        return $resultado;
    }

    public static function buscaServico($id,$param)
    {
        $pdo = getConexao();

        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $resultado = $pdo->prepare("SELECT * FROM servico WHERE id = :id;");

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

}