<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport", initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>

	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"
</head>
<body>
<?php include_once ("assets/header.php");?>
<?php include "./BDaccess/BDaccess.php";?>


<div class="container mt-5 mb-5 ">
    <div class="row justify-content-around">
        <div class="col-7 border rounded pb-2">
            <div>
                <h3 class="p-2">Produtos</h3>
            </div>
            <table class="table">
                <thead class="border-top-0">
                    <tr style="text-align: center;">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Qtd.</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $Car_produto = Carrinho_produtoBD::allCarrinhoProduto();
                    $indexCP = 1;
                    $somaCP = 0;
                    foreach ($Car_produto as $row)
                    {
                    ?>
                    <tr style="text-align: center;">
                    <th scope="row"><?php echo $indexCP;?></th>
                    <td><?php echo ProdutoBD::buscaProduto($row['id_produto'],'nome');?></td>
                    <td>R$<?php echo number_format((ProdutoBD::buscaProduto($row['id_produto'],'preco')), 2, ',', '.');?></td>
                    <td ><?php echo $row ['quantidade'];?></td>
                    <td class="row justify-content-around"> 

                        <form id="formularioAdd" method="post" action="BDaccess/BDaccess.php?bd=Carrinho_produtoBD&acao=alterar&id=<?php echo $row['id']?>&quantidade=<?php echo $row['quantidade']+1?>" name="formularioAdd">
                            <button class="btn btn-success m-0 p-0" style="width: 25px; height: 25px;">+</button>
                        </form>
                    </td>
                    <td>
                        <form id="formularioSub" method="post" action="BDaccess/BDaccess.php?bd=Carrinho_produtoBD&acao=alterar&id=<?php echo $row['id']?>&quantidade=<?php echo $row['quantidade']-1?>" name="formularioSub">
                            <button class="btn btn-danger m-0 p-0" style="width: 25px; height: 25px;" >-</button>
                        </form>
                    </td>
                    <td>R$<?php echo number_format((($row ['quantidade']*ProdutoBD::buscaProduto($row['id_produto'],'preco'))), 2, ',', '.');?></td>
                    <td>
                        <form id="formularioDel" method="post" action="BDaccess/BDaccess.php?bd=Carrinho_produtoBD&acao=deletar&id=<?php echo $row['id']?>" name="formularioDel">
                                <button type="submit" class="btn m-0 p-0" style="width: 25px; height: 25px;">x</button>
                        </form>
                    </td>
                    </tr>
                <?php
                $indexCP++;
                $somaCP = $somaCP + ($row ['quantidade']*ProdutoBD::buscaProduto($row['id_produto'],'preco'));}
                $pdo = null;?>
                </tbody>
            </table>
            <hr style="width: 630px;">
            <div class="row justify-content-around">
                <h3 class='col-md-9'>Total Produtos:</h3>
                <h3 class='col-md-3'>R$ <?php echo number_format($somaCP,2,',','.');?></h3>
            </div>
        </div>

        <div class="col-md-4 border rounded pb-2">
            <h3 class="p-2">Serviços</h3>
            <table class="table">
                <thead>
                    <tr style="text-align: center;">
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                
                
                <?php 
                $Car_servico = Carrinho_servicoBD::allCarrinhoServico();
                $indexCS = 1;
                $somaCS = 0;
                foreach ($Car_servico as $row)
                    {
                    ?>
                    <tr style="text-align: center;">
                    <th ><?php echo $indexCS;?></th>
                    <td><?php echo ServicoBD::buscaServico($row['id_servico'],'nome');?></td>
                    <td>R$<?php echo number_format((ServicoBD::buscaServico($row['id_servico'],'preco')), 2, ',', '.');?></td>
                    <td>R$<?php echo number_format(ServicoBD::buscaServico($row['id_servico'],'preco'), 2, ',', '.');?></td>
                    <td>
                        <form id="formularioDel" method="post" action="BDaccess/BDaccess.php?bd=Carrinho_servicoBD&acao=deletar&id=<?php echo $row['id']?>" name="formularioDel">
                            <button type="submit" class="btn">X</button>
                        </form>
                    </td>    
                    </tr>
                <?php
                $indexCS++;
                $somaCS = $somaCS + ServicoBD::buscaServico($row['id_servico'],'preco');}?>
                </tbody>
            </table>
            <hr style="width: 350px;">
            <div class="row justify-content-around">
                <h3 class='col-md-8'>Total Serviços:</h3>
                <h3 class='col-md-4'>R$ <?php echo number_format($somaCS,2,',','.');?></h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div style="height: 300px; margin-top: 60px;">
            <br>
            <br>
            <center>
                <h2 class="mb-5">Total Geral: R$ <?php echo number_format(($somaCS+$somaCP),2,',','.');?> </h4>
            </center>
            <center>
                <a href="./index.php">
                    <button class='btn btn-lg btn-block' style="background-color: #e4c1f9; color:white; font-size:30px;">Confirmar compra!</button>
                </a>
            </center>
        </div>
    </div>
</div>

<?php include_once ("assets/footer.php");?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>