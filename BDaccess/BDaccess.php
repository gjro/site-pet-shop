<?php

include 'conexao.php';
include 'ProdutoBD.php';
include 'ServicoBD.php';
include 'DonoBD.php';
include 'ClienteBD.php';
include 'Carrinho_produtoBD.php';
include 'Carrinho_servicoBD.php';
include 'VendaBD.php'; 

if (isset($_GET['acao'],$_GET['bd']))
{
    switch ($_GET['bd'])
    {
        case "ProdutoBD":
            {
                funcProdutoBD($_GET['acao']);
            }
        break;
    
        case "ServicoBD":
            {
                funcServicoBD($_GET['acao']);
            }
        break;

        case "Carrinho_produtoBD":
            {
                funcCarrinhoProdutoBD($_GET['acao']);
            }
        break;

        case "Carrinho_servicoBD":
            {
                funcCarrinhoServicoBD($_GET['acao']);
            }
    }
}


function funcProdutoBD($acao)
{
    switch($acao)
    {
        case 'alterar':
            {
                ProdutoBD::atualizarProduto($_GET['id'],$_POST['imagem'],$_POST['descricao'],$_POST['categoria'],$_POST['preco']);
            }
        break;

        case 'deletar':
            {
                ProdutoBD::deletarProduto($_GET['id']);
            }
        break;

        case 'inserir':
            {
                ProdutoBD::inserirProduto($_POST['imagem'], $_POST['nome'], $_POST['categoria'], $_POST['descricao'], $_POST['preco'], $_POST['quantidade']);
            }
        break;


    }
header('location:../produtos-admin.php');
}

function funcServicoBD($acao)
{
    switch($acao)
    {
        case 'alterar':
            {
                ServicoBD::atualizarServico($_GET['id'],$_POST['imagem'],$_POST['descricao'],$_POST['preco']);
            }
        break;

        case 'deletar':
            {
                ServicoBD::deletarServico($_GET['id']);
            }
        break;

        case 'inserir':
            {
                ServicoBD::inserirServico($_POST['imagem'], $_POST['nome'], $_POST['descricao'], $_POST['preco']);
            }
        break;
    }
    header('location:../servicos-admin.php');
}

function funcCarrinhoProdutoBD($acao)
{
    switch($acao)
    {
        case 'inserir':
            {
                Carrinho_produtoBD::inserirCarrinhoProduto($_GET['id'],1);
                header('location:../produtos.php');
            }
        break;

        case 'alterar':
            {
                Carrinho_produtoBD::atualizarCarrinhoProduto($_GET['id'],$_GET['quantidade']);
                header('location:../venda.php');
            }
        break;

        case 'deletar':
            {
                Carrinho_produtoBD::deletarCarrinhoProduto($_GET['id']);
                header('location:../venda.php');
            }
    }
    
}

function funcCarrinhoServicoBD($acao)
{
    switch($acao)
    {
        case "deletar":
            {
                Carrinho_servicoBD::deletarCarrinhoServico($_GET['id']);
                header('location:../venda.php');
            }
        break;

        case "inserir":
            {
                Carrinho_servicoBD::inserirCarrinhoServico($_GET['id'],5);
                header('location:../servicos.php');
            }
    }
}