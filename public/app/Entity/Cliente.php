<?php
namespace App\Entity;

use App\Db\Database;

class Cliente
{
    /** @var Int $id Identificador único de cliente */
    public $id;

    /** @var String $nome Nome do cliente */
    public $nome;
    
    /** @var Number $documento Documento do cliente */
    public $documento;
    
    /** @var Number $cep Cep do cliente */
    public $cep;

    /** @var String $endereco Endereço do cliente */
    public $endereco;

    /** @var String $bairro Bairro do cliente */
    public $bairro;
    
    /** @var String $cidade Cidade do cliente */
    public $cidade;

    /** @var String $uf Estado do cliente */
    public $uf;

    /** @var String $telefone Telefone do cliente */
    public $telefone;

    /** @var String $email Email do cliente */
    public $email;

    /** @var String $ativo Define se cliente está ativo */
    public $ativo;
    
    /** @var String $atualizado_em Data de atualização do cliente */
    public $atualizado_em;

    /** @var String $criado_em Data de cadastro do cliente */
    public $criado_em;

    /**
     * Método responsável por cadastrar um novo cliente no banco
     *
     * @return Boolean
     **/
    public function cadastrar()
    {
        $this->criado_em = date('Y-m-d H:i:s');

        $obCliente = new Database('clientes');

        $this->id = $obCliente->insert([
            'nome' => $this->nome,
            'documento' => $this->documento,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'uf' => $this->uf,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'ativo' => $this->ativo,
            'criado_em' => $this->criado_em,
        ]);

        return true;
    }
}