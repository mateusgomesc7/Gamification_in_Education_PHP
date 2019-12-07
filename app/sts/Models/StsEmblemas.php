<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsEmblemas
{
    private $Resultado;

    public function buscarEmblemas()
    {
        $emblemas = new \App\sts\Models\helper\StsRead();
        $emblemas->fullRead(' SELECT id, nome, descricao, icone
        FROM sts_emblemas_pontos
        WHERE adms_sit_id =:adms_sit_id
        AND quant_pontos <=:quant_pontos
        ORDER BY quant_pontos DESC
        LIMIT :limit', "adms_sit_id=1&quant_pontos={$_SESSION['usuario_pontos']}&limit=1");
        
        $this->Resultado = $emblemas->getResultado();
        return $this->Resultado;
    }
}