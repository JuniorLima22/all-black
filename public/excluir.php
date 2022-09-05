<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

use App\Helpers\FlashMessage;
use App\Entity\Cliente;

$session = new FlashMessage();

/** Validação de $id identificador único de cliente */
if (!isset($_POST['id']) or !is_numeric($_POST['id'])) {
    $session->flash('message', 'ID do cliente inválido.');
    $session->flash('type', 'danger');

    header('Location: /');
    exit;
}

/** Consultar Cliente */
$obCliente = Cliente::getCliente($_POST['id']);

/** Validação se Cliente existe */
if (!$obCliente instanceof Cliente) {
    $session->flash('message', 'Cliente não encontrado.');
    $session->flash('type', 'danger');

    header('Location: /');
    exit;
}

if (isset($_POST['excluir'])) {

    if ($obCliente->excluir()) {
        $session->flash('message', 'Cliente excluido com sucesso.');
        $session->flash('type', 'success');

        header('Location: /');
        exit;
    }

    $session->flash('message', 'Erro ao excluir cliente.');
    $session->flash('type', 'danger');

    header('Location: /');
    exit;
}
