<?php


class VendaBD
{
   

    public static function inserirVenda($id_dono, $id_carrinho_produto, $valor, $tipo_de_pagamento,
                                         $data, $desconto)
    {
        $pdo = getConexao();
        try 
        {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('INSERT INTO venda (id_dono, id_carrinho_produto, valor, tipo_pagamento,data, desconto) 
                               VALUES(:id_dono, :id_carrinho_produto, :valor, :tipo_pagamento, :data, :desconto)');

        $stmt->execute(array(
            ':id_dono' => $id_dono,
            ':id_carrinho_produto' => $id_carrinho_produto,
            ':valor' => $valor,
            ':tipo_pagamento' => $tipo_de_pagamento,
            ':data' => $data,
            ':desconto' => $desconto
        ));
        } 
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    }


    
    public static function deletarCarrinhoServico($id)
    {
        try {
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $pdo->prepare('DELETE FROM venda WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id
            ));

        } catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }

}