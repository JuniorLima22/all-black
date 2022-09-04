<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

use App\Helpers\FlashMessage;
use App\Entity\Cliente;

$session = new FlashMessage();

/** Parâmetros da URL */
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

$ativo = filter_input(INPUT_GET, 'ativo', FILTER_SANITIZE_STRING);
$ativo = in_array($ativo, ['SIM', 'NÃO']) ? $ativo : '';

/** Condições SQL */
$condicoes = [
    strlen($ativo) ? 'ativo = "' . $ativo . '"' : null,
    strlen($busca) ? 'nome LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null,
];

/** Remove posições vazias das condições */
$condicoes = array_filter($condicoes);

/** Cláusula WHERE */
$where = implode(' AND ', $condicoes);
$where .= strlen($busca) ? ' OR documento LIKE "%' . str_replace(' ', '%', $busca) . '%"' : null;

$clientes = Cliente::getClientes(null, $where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';
