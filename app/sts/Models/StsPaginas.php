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
        if(!isset($_SESSION['sts_niveis_acesso_id'])){
            $_SESSION['sts_niveis_acesso_id'] = null;
        }
        $this->UrlController = (string) $UrlController;
        $this->UrlMetodo = (string) $UrlMetodo;
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead("SELECT pg.id,
                tpg.tipo tipo_tpg
                FROM sts_paginas pg
                INNER JOIN sts_tps_pgs tpg ON tpg.id=pg.sts_tps_pg_id
                LEFT JOIN sts_nivacs_pgs nivpg ON nivpg.sts_pagina_id=pg.id AND nivpg.sts_niveis_acesso_id =:sts_niveis_acesso_id
                WHERE (pg.controller =:controller
                AND pg.metodo =:metodo) AND ((pg.lib_pub =:lib_pub) OR (nivpg.permissao =:permissao))
                LIMIT :limit", "sts_niveis_acesso_id={$_SESSION['sts_niveis_acesso_id']}&controller={$this->UrlController}&metodo={$this->UrlMetodo}&lib_pub=1&permissao=1&limit=1");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;        
    }
}