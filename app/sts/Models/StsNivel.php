<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsNivel
{
    private $Resultado;
    private $PontosAtual;

    public function verNivel()
    {
        $QuantPontos = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $QuantPontos->verPotuacaoAtual();

        $nivel = new \App\sts\Models\helper\StsRead();
        $nivel->fullRead('SELECT id, quant_pontos
        FROM sts_nivel
        WHERE adms_sit_id =:adms_sit_id
        AND quant_pontos <=:quant_pontos
        ORDER BY quant_pontos DESC
        LIMIT :limit',"adms_sit_id=1&quant_pontos={$this->PontosAtual[0]['pontos']}&limit=1");

        $this->Resultado = $nivel->getResultado();
        return $this->Resultado;
    }

    public function verPontosProxNivel()
    {
        $QuantPontos = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $QuantPontos->verPotuacaoAtual();

        $pontosProxNivel = new \App\sts\Models\helper\StsRead();
        $pontosProxNivel->fullRead('SELECT quant_pontos
        FROM sts_nivel
        WHERE adms_sit_id =:adms_sit_id
        AND quant_pontos >:quant_pontos
        LIMIT :limit',"adms_sit_id=1&quant_pontos={$this->PontosAtual[0]['pontos']}&limit=1");

        $this->Resultado = $pontosProxNivel->getResultado();
        return $this->Resultado;
    }
}