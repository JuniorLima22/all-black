<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Carregar arquivo XML');

use App\Helpers\FlashMessage;
use App\Entity\Cliente;
use App\Helpers\Validate;

$session = new FlashMessage();
$validate = new Validate();

if (isset($_FILES['file'])) {
    if ($_FILES['file']['type'] == 'text/xml') {

        $xmls = simplexml_load_file($_FILES['file']['tmp_name']);

        if (count($xmls) > 0) {

            foreach ($xmls as $key => $xml) {

                $documentoLimpo = preg_replace('/[^0-9]/', '', $xml['documento']);
                $cepLimpo = preg_replace('/[^0-9]/', '', $xml['cep']);
                $ativoLimpo = empty($xml['ativo']) ? 'NÃO' : 'SIM';

                /** Cláusula WHERE */
                $where = 'documento = ' . $documentoLimpo;

                /** Consultar se documento do cliente já existe */
                $cliente = Cliente::getClientes(null, $where);
                
                if (count($cliente) == 0) {
                    /** Executa cadastro de novo cliente */
                    $obCliente = new Cliente;
                    $obCliente->nome = $xml['nome'];
                    $obCliente->documento = $documentoLimpo;
                    $obCliente->cep = $cepLimpo;
                    $obCliente->endereco = $xml['endereco'];
                    $obCliente->bairro = $xml['bairro'];
                    $obCliente->cidade = $xml['cidade'];
                    $obCliente->uf = $xml['uf'];
                    $obCliente->telefone = $xml['telefone'];
                    $obCliente->email = $xml['email'];
                    $obCliente->ativo = $ativoLimpo;

                    if ($obCliente->cadastrar()) {
                        $session->flash('message', 'Clientes cadastrado com sucesso.');
                        $session->flash('type', 'success');
                    }

                    $session->flash('message', 'Erro ao cadastrar clientes.');
                    $session->flash('type', 'danger');
                } else {

                    /** Atualiza cliente já existente */
                    $obCliente = new Cliente;
                    $obCliente->id = $cliente[0]->id;
                    $obCliente->nome = $xml['nome'];
                    $obCliente->documento = $documentoLimpo;
                    $obCliente->cep = $cepLimpo;
                    $obCliente->endereco = $xml['endereco'];
                    $obCliente->bairro = $xml['bairro'];
                    $obCliente->cidade = $xml['cidade'];
                    $obCliente->uf = $xml['uf'];
                    $obCliente->telefone = $xml['telefone'];
                    $obCliente->email = $xml['email'];
                    $obCliente->ativo = $ativoLimpo;

                    if ($obCliente->atualizar()) {
                        $session->flash('message', 'Clientes atualizados com sucesso.');
                        $session->flash('type', 'success');
                    }
                }
            }
        }
    } else {
        $session->flash('message', 'Tipo de arquivo incompatível: <strong>' . $_FILES['file']['name'] . '</strong>');
        $session->flash('type', 'danger');
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario_xml.php';
include __DIR__ . '/includes/footer.php';
