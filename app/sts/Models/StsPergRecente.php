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
        $listar->fullRead('SELECT titulo, id FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit', "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
