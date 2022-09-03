<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

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

    /**
     * Método responsavel por atualizar cliente no banco
     *
     * @return Boolean
     **/
    public function atualizar()
    {
        $this->atualizado_em = date('Y-m-d H:i:s');

        (new Database('clientes'))->update('id = ' . $this->id, [
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
            'atualizado_em' => $this->atualizado_em,
        ]);

        return true;
    }

    /**
     * Método responsavel por deletar cliente no banco
     *
     * @return Boolean
     **/
    public function excluir()
    {
        (new Database('clientes'))->delete('id = '. $this->id);

        return true;
    }

    /**
     * Método responsavel por listar clientes do banco de dados
     *
     * @param String $join  JOIN cláusula
     * @param String $where WHERE cláusula
     * @param String $order ORDER cláusula
     * @param String $limit LIMIT cláusula
     * @return Array
     **/
    public static function getClientes($join = null, $where = null, $order = null, $limit = null)
    {
        return (new Database('clientes'))->select($join, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsavel por buscar um cliente com base em seu ID
     *
     * @param Integer $id
     * @return Cliente
     **/
    public static function getCliente($id)
    {
        return (new Database('clientes'))->select(null, 'id = ' . $id)
            ->fetchObject(self::class);
    }
}
