<?php
session_start();

require __DIR__.'/vendor/autoload.php';

use App\Helpers\FlashMessage;
use App\Entity\Cliente;

$session = new FlashMessage();

$clientes = Cliente::getClientes();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';