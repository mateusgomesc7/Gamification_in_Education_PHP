<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsCatPerg
{

    private $Resultado;

    public function listarCatPerg()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT perg.id, perg.nome, perg.icone
                FROM sts_cats_perguntas perg
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id', "adms_sit_id=1");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
