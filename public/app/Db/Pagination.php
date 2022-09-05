<?php

namespace App\Db;

class Pagination
{
    /** @var Int $limit Número máximo de registros por página */
    private $limit;

    /** @var Int $results Quantidade total de resultados do banco */
    private $results;

    /** @var Int $pages Quantidade de páginas */
    private $pages;

    /** @var Int $currentPage Página atual */
    private $currentPage;

    /**
     * Construtor da classe
     *
     * @param Int $results
     * @param Int $currentPage
     * @param Int $limit
     **/
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results     = $results;
        $this->limit       = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Método responsavel por calcular a páginação
     *
     **/
    private function calculate()
    {
        /** Calcula o total de páginas */
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        /** Verifica se a página atual não excede o número de páginas */
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Método responsavel por retornar a cláusula limit do SQL
     *
     * @return String
     **/
    public function getLimit()
    {
        $offset = ($this->limit * ($this->currentPage - 1));

        return $offset . ',' . $this->limit;
    }

    /**
     * Método responsavel por retornar as opções de páginas disponível
     *
     * @return Array
     **/
    public function getPages()
    {
        /** Não retorna páginas */
        if ($this->pages == 1) return [];

        /** Páginas */
        $pages = [];

        for ($i=1; $i <= $this->pages; $i++) { 
            $pages[] = [
                'page' => $i,
                'current' => $i == $this->currentPage
            ];
        }

        return $pages;
    }
}
