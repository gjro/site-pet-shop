<?php

//include 'conexao.php';

class ClienteBD
{
   

    public static function inserirCliente($nome, $raca, $idade, $id_dono)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO cliente (nome, raca, idade, id_dono) 
                               VALUES(:nome, :raca, :idade, :id_dono)');

        $stmt->execute(array(
            ':nome' => $nome,
            ':raca' => $raca,
            ':idade' => $idade,
            ':id_dono' => $id_dono
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarCliente($id)
    {
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM cliente WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

    public static function buscaCliente($id,$param)
    {
        $pdo = getConexao();

        try 
        {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $resultado = $pdo->prepare("SELECT * FROM cliente WHERE id = :id;");

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