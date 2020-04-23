<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"
</head>
<body class="img-fluid">
    <?php include_once ("assets/header.php");?>
    <?php
        include "./BDaccess/BDaccess.php";
    
        $resultado = ServicoBD::allServico();
        $index = 1;
    ?>
    <div>

        <div class="container mt-5">
            <div class="row">
            <?php foreach($resultado as $row){?>
                
                <div id="card<?php echo $index ?>" class="h-25 d-inline-block col-md-4 mt-5 mb-5">
                    <div class="card" style="width: 350px; height: 500px;">
                        <div class="card-header" style="background-color: white;">
                            <img src="<?php echo $row ['imagem']?>" class="card-img-top img-fluid d-block">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-light text-center"><?php echo $row ['nome']?></h5>
                            <hr>
                        </div>
                        <div>
                            <center>
                                <p class="font-weight-normal mt-0 m-0 text-center" style="font-size: 35px;">R$ <?php echo number_format(($row ['preco']), 2, ',', '.');?></p>
                                <a href="#" class="btn btn-block" data-toggle="modal" data-target="#modalProduto<?php echo $index?>" style="background-color: #7dffb1; height: 60px; ">
                                    <p class="font-weight-bold" style="color: white; font-size: 30px;">Adicionar ao Carrinho</p>
                                </a>
                            </center>
                        </div>     
                    </div>       
                </div>
    
                <div class="modal fade" id="modalProduto<?php echo $index?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Produto <?php echo $row ['nome']?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <img src="<?php echo $row ['imagem']?>" class="tamImagem" alt="">
                                        </div>
                                    <div class="col-md-6 pr-0">
                                        <p style="height:160px;" class="border rounded p-1 mb-1"> <?php echo $row ['descricao']?></p>
                                        <h3 class="font-weight-bold mb-0">R$ <?php echo number_format(($row ['preco']), 2, ',', '.');?></h3>
                                        <form id="formularioAdd" method="post" action="BDaccess/BDaccess.php?bd=Carrinho_servicoBD&acao=inserir&id=<?php echo $row['id']?>" name="formularioAdd">
                                            <button type="submit" class="col-md-5 btn" style="background-color: #7dffb1; color: white; box-sizing: border-box; width: 50%; float: right;">Confirmar</button>
                                        </form>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $index = $index +1;}?>
        </div>
    </div>
    <footer>
        <?php include_once ("assets/footer.php"); ?>
    </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>