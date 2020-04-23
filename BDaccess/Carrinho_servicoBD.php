<?php

//include 'conexao.php';

class Carrinho_servicoBD
{
   

    public static function inserirCarrinhoServico($id_servico, $id_cliente)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO carrinho_servico (id_servico, id_cliente) 
                               VALUES(:id_servico, :id_cliente)');

        $stmt->execute(array(
            ':id_servico' => $id_servico,
            ':id_cliente' => $id_cliente
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarCarrinhoServico($id)
    {
        $pdo = getConexao();
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM carrinho_servico WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public static function allCarrinhoServico()
    {
        $pdo = getConexao();

        $resultado = $pdo->query("SELECT * FROM carrinho_servico");

        return $resultado;
    }
}