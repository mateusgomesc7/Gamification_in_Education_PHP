<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergDestaque
{
    private $Resultado;
    
    public function listarPergDestaque()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT titulo, slug FROM sts_artigos 
                WHERE sts_sit_id =:sts_sit_id
                ORDER BY qnt_acesso DESC 
                LIMIT :limit', "sts_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
