<?php
function getConexao()
{
    $dsn =  'mysql:host=localhost;dbname=petshop';
    $user = 'root';
    $pass = '';

    try
    {
        $pdo = new PDO($dsn,$user,$pass);
        return $pdo;
    }
    catch (PDOException $ex)
    {
        echo 'Erro: '.$ex->getMessage();
    }
}