<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Cliente;

/** Validação de $id identificador único de cliente */
if (!isset($_POST['id']) or !is_numeric($_POST['id'])) {
    header('Location: /?status=error_id_invalido');
    exit;
}

/** Consultar Cliente */
$obCliente = Cliente::getCliente($_POST['id']);

/** Validação se Cliente existe */
if (!$obCliente instanceof Cliente) {
    header('Location: /?status=error_cliente_nao_encontrado');
    exit;
}

if (isset($_POST['excluir'])) {

    if ($obCliente->excluir()) {
        header('Location: /?status=success_cliente_excluido');
        exit;
    }

    header('Location: /?status=error_ao_excluir_cliente');
    exit;
}
