<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPaginas
{
    private $Resultado;
    private $UrlController;
    private $UrlMetodo;

    public function listarPaginas($UrlController = null, $UrlMetodo = null)
    {
        $this->UrlController = (string) $UrlController;
        $this->UrlMetodo = (string) $UrlMetodo;
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead("SELECT pg.id,
                tpg.tipo tipo_tpg
                FROM sts_paginas pg
                INNER JOIN sts_tps_pgs tpg ON tpg.id=pg.sts_tps_pg_id
                WHERE pg.controller =:controller
                AND pg.metodo =:metodo
                LIMIT :limit", "controller={$this->UrlController}&metodo={$this->UrlMetodo}&limit=1");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;        
    }
}