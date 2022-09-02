<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Cliente;
use App\Helpers\Validate;

$validate = new Validate();

if (isset($_POST['nome'], $_POST['documento'])) {

    $validate->validate([
        'nome' => ['max:200', 'min:3', 'required'],
        'documento' => ['numeric', 'required'],
        'cep' => ['numeric', 'required'],
        'endereco' => ['max:255', 'min:3', 'required'],
        'bairro' => ['max:255', 'required'],
        'cidade' => ['max:100', 'required'],
        'uf' => ['max:2', 'required'],
        'telefone' => ['numeric', 'max:20'],
        'ativo' => ['exists:SIM,NÂO', 'required'],
    ]);
    
    if (!empty($_POST['email'])) {
        $validate->validate([
            'email' => ['max:255', 'email'],
        ]);
    }

    if (count($validate->errors()) == 0) {
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
            header('Location: index.php?status=success');exit;
        }
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
