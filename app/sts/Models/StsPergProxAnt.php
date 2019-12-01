<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergProxAnt
{

    private $Resultado;
    private $IdPergunta;

    public function perguntaProximo($IdPergunta = null)
    {
        $this->IdPergunta = (int) $IdPergunta;
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id AND id >:id
                ORDER BY id ASC 
                LIMIT :limit', "adms_sit_id=1&id={$this->IdPergunta}&limit=1");

        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

    public function perguntaAnterior($IdPergunta = null)
    {
        $this->IdPergunta = (int) $IdPergunta;
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id AND id <:id
                ORDER BY id DESC 
                LIMIT :limit', "adms_sit_id=1&id={$this->IdPergunta}&limit=1");

        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
