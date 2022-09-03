<?php
require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Cliente');

use App\Entity\Cliente;
use App\Helpers\Validate;

$validate = new Validate();

/** Validação de $id identificador único de cliente */
if (!isset($_REQUEST['id']) OR !is_numeric($_REQUEST['id'])) {
    header('Location: /?status=error_id_invalido');
    exit;
}

/** Consultar CLiente */
$obCliente = Cliente::getCliente($_REQUEST['id']);

/** Validação se Cliente existe */
if (!$obCliente instanceof Cliente) {
    header('Location: /?status=error_cliente_nao_encontrado');
    exit;
}

if (isset($_POST['nome'], $_POST['documento'])) {

    $validate->validate([
        'nome' => ['max:200', 'min:3', 'required'],
        'documento' => ['numeric', 'required'],
        'cep' => ['numeric', 'required'],
        'endereco' => ['max:255', 'min:3', 'required'],
        'bairro' => ['max:255', 'required'],
        'cidade' => ['max:100', 'required'],
        'uf' => ['max:2', 'required'],
        'telefone' => ['max:20', 'numeric'],
        'ativo' => ['exists:SIM,NÃO', 'required'],
    ]);

    if (!empty($_POST['email'])) {
        $validate->validate([
            'email' => ['max:255', 'email'],
        ]);
    }

    for ($i = 0; $i < count($validate->fields); $i++) {
        if (array_keys($validate->fields[$i])[0] == 'nome') {
            $nome_old = $validate->fields[$i]['nome'];
        }
        if (array_keys($validate->fields[$i])[0] == 'documento') {
            $documento_old = $validate->fields[$i]['documento'];
        }
        if (array_keys($validate->fields[$i])[0] == 'cep') {
            $cep_old = $validate->fields[$i]['cep'];
        }
        if (array_keys($validate->fields[$i])[0] == 'endereco') {
            $endereco_old = $validate->fields[$i]['endereco'];
        }
        if (array_keys($validate->fields[$i])[0] == 'bairro') {
            $bairro_old = $validate->fields[$i]['bairro'];
        }
        if (array_keys($validate->fields[$i])[0] == 'cidade') {
            $cidade_old = $validate->fields[$i]['cidade'];
        }
        if (array_keys($validate->fields[$i])[0] == 'uf') {
            $uf_old = $validate->fields[$i]['uf'];
        }
        if (array_keys($validate->fields[$i])[0] == 'telefone') {
            $telefone_old = $validate->fields[$i]['telefone'];
        }
        if (array_keys($validate->fields[$i])[0] == 'email') {
            $email_old = $validate->fields[$i]['email'];
        }
        if (array_keys($validate->fields[$i])[0] == 'ativo') {
            $ativo_old = $validate->fields[$i]['ativo'];
        }
    }

    if (count($validate->errors()) == 0) {
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

        if ($obCliente->atualizar()) {
            header('Location: index.php?status=success_cliente_atualizado');
            exit;
        }
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';