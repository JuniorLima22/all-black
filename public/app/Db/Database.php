<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database
{
    /** @var String Host de conexão com o banco de dados */
    const HOST = 'localhost';

    /** @var String Nome do banco de dados */
    const NAME = 'all_blacks';

    /** @var String Usuário do banco de dados */
    const USER = 'root';

    /** @var String Senha de acesso ao banco e dados */
    const PASS = '';

    /** @var Int Porta de acesso ao banco e dados */
    const PORT = '';

    /** @var String Nome da tabela a ser manipulada */
    private $table;

    /** @var PDO Instancia de conexão com o banco de dados */
    private $connection;

    /**
     * Define a tabela e instancia de conexão
     *
     * @param String $table
     **/
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsavel por criar uma conexão com o banco de dados
     *
     **/
    public function setConnection()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';port='.self::PORT.';dbname='.self::NAME.';charset=utf8mb4', self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Error Connect: '. $e->getMessage());
        }
    }

    /**
     * Método responsavel por executar queries dentro do banco de dados
     *
     * @param String $query
     * @param Array $params
     * @return PDOStatement
     **/
    public function execute($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('Error Execute: '. $e->getMessage());
        }
    }

    /**
     * Método responsavel por inserir dados no banco de dados
     *
     * @param Array $values [field => value]
     * @return Integer ID inserido
     **/
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        
        $query = 'INSERT INTO '. $this->table. ' ('. implode(',', $fields) .') VALUES ('. implode(',', $binds) .')';

        $this->execute($query, array_values($values));
        
        return $this->connection->lastInsertId();
    }
}
