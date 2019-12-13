<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsEmblemas
{
    private $Resultado;
    private $PontosAtual;

    public function buscarEmblemas()
    {
        $QuantPontos = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $QuantPontos->verPotuacaoAtual();


        $emblemas = new \App\sts\Models\helper\StsRead();
        $emblemas->fullRead(' SELECT emb.id, emb.nome, emb.descricao, emb.icone,
        color.cor
        FROM sts_emblemas_pontos emb
        INNER JOIN sts_cors color ON color.id=emb.sts_cor_id
        WHERE adms_sit_id =:adms_sit_id
        AND quant_pontos <=:quant_pontos
        ORDER BY quant_pontos DESC', "adms_sit_id=1&quant_pontos={$this->PontosAtual[0]['pontos']}");
        
        $this->Resultado = $emblemas->getResultado();
        return $this->Resultado;
    }

    public function verQuantEmblemas()
    {
        $QuantPontos = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $QuantPontos->verPotuacaoAtual();

        $quantEmblemas = new \App\sts\Models\helper\StsRead();
        $quantEmblemas->fullRead('SELECT COUNT(id)
        FROM sts_emblemas_pontos
        WHERE adms_sit_id =:adms_sit_id
        AND quant_pontos <=:quant_pontos',"adms_sit_id=1&quant_pontos={$this->PontosAtual[0]['pontos']}");

        $this->Resultado = $quantEmblemas->getResultado();
        return $this->Resultado;
    }
}