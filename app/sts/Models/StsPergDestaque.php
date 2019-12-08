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
        $listar->fullRead('SELECT titulo, id FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY qnt_acesso DESC 
                LIMIT :limit', "adms_sit_id=1&limit=3");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}
