<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Cliente;

if (isset($_POST['nome'], $_POST['documento'])) {
    $obCliente = new Cliente;
    $obCliente->nome = $_POST['nome'];
    $obCliente->documento = $_POST['documento'];
    $obCliente->cep = $_POST['cep'];
    $obCliente->endereco = $_POST['endereco'];
    $obCliente->bairro = $_POST['bairro'];
    $obCliente->cidade = $_POST['cidade'];
    $obCliente->uf = $_POST['uf'];
    $obCliente->telefone = $_POST['telefone'];
    $obCliente->email = $_POST['email'];
    $obCliente->ativo = $_POST['ativo'];

    if ($obCliente->cadastrar()) {
        header('Location: index.php?status=success'); exit;
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
