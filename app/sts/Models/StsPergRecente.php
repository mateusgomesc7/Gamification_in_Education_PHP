<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergRecente
{

    private $Resultado;

    public function listarPergRecente()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT titulo, slug FROM sts_artigos 
                WHERE sts_sit_id =:sts_sit_id
                ORDER BY id DESC
                LIMIT :limit', "sts_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
