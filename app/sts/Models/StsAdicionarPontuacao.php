<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsAdicionarPontuacao
{
    private $Dados;
    private $IdPontuacao;
    private $GanhoDePontos;
    private $PontosAtual;

    function getGanhoDePontos()
    {
        return $this->GanhoDePontos;
    }

    public function pontosPorResposta(){
        $this->IdPontuacao = 1;

        $pontuacaoAtual = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $pontuacaoAtual->verPotuacaoAtual();

        $ganhoDePontos = new \App\sts\Models\helper\StsRead();
        $ganhoDePontos->fullRead('SELECT quant_pontos
                            FROM sts_pontos
                            WHERE adms_sit_id =:adms_sit_id
                            AND id =:id
                            LIMIT :limit', "adms_sit_id=1&id={$this->IdPontuacao}&limit=1");
        $this->GanhoDePontos = $ganhoDePontos->getResultado();
        
        // Transformano String em inteiro:
        $this->PontosAtual = intval($this->PontosAtual[0]['pontos']);
        $this->GanhoDePontos = intval($this->GanhoDePontos[0]['quant_pontos']);
        
        // Adicionando o ganho de pontos
        $this->Dados['pontos'] = $this->PontosAtual + $this->GanhoDePontos;

        // var_dump($this->Dados);

        $AltPontos = new \App\sts\Models\helper\StsUpdate();
        $AltPontos->exeUpdate("sts_usuarios", $this->Dados, "WHERE id =:id", "id=" . $_SESSION['usuario_id']);

    }

    public function pontosPorPergunta(){
        $this->IdPontuacao = 2;

        $pontuacaoAtual = new \App\sts\Models\StsPontos();
        $this->PontosAtual = $pontuacaoAtual->verPotuacaoAtual();

        $ganhoDePontos = new \App\sts\Models\helper\StsRead();
        $ganhoDePontos->fullRead('SELECT quant_pontos
                            FROM sts_pontos
                            WHERE adms_sit_id =:adms_sit_id
                            AND id =:id
                            LIMIT :limit', "adms_sit_id=1&id={$this->IdPontuacao}&limit=1");
        $this->GanhoDePontos = $ganhoDePontos->getResultado();
        
        // Transformano String em inteiro:
        $this->PontosAtual = intval($this->PontosAtual[0]['pontos']);
        $this->GanhoDePontos = intval($this->GanhoDePontos[0]['quant_pontos']);
        
        // Adicionando o ganho de pontos
        $this->Dados['pontos'] = $this->PontosAtual + $this->GanhoDePontos;

        var_dump($this->Dados);
        
        $AltPontos = new \App\sts\Models\helper\StsUpdate();
        $AltPontos->exeUpdate("sts_usuarios", $this->Dados, "WHERE id =:id", "id=" . $_SESSION['usuario_id']);

    }

} 