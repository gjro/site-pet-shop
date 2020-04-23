<?php

//include 'conexao.php';

class DonoBD
{
   

    public static function inserirDono($nome, $cpf, $endereco, $telefone, $fidelidade)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO dono (nome, cpf, endereco, telefone, fidelidade) 
                               VALUES(:nome, :cpf, :endereco, :telefone, :fidelidade)');

        $stmt->execute(array(
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':endereco' => $endereco,
            ':telefone' => $telefone,
            ':fidelidade' => $fidelidade
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarDono($id)
    {
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM dono WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

}