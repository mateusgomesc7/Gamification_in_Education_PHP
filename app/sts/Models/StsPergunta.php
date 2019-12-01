<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergunta
{
    private $Resultado;
    private $IdPergunta;

    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 2;

    function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

    public function visualizarPergunta($IdPergunta = null)
    {
        $this->IdPergunta = (string) $IdPergunta;
        $visualizarPerg = new \App\sts\Models\helper\StsRead();
        $visualizarPerg->fullRead('SELECT id, titulo, conteudo, imagem, slug FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id AND id =:id
                ORDER BY id DESC
                LIMIT :limit', "adms_sit_id=1&id={$this->IdPergunta}&limit=1");
        $this->Resultado = $visualizarPerg->getResultado();        
        return $this->Resultado;
    }

    public function listarPerguntas($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \App\sts\Models\helper\StsPaginacao(URL . 'VerPerguntas/perguntas');
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao('SELECT COUNT(id) AS num_result
                FROM sts_perguntas
                WHERE adms_sit_id =:adms_sit_id', 'adms_sit_id=1');
        $this->ResultadoPg = $paginacao->getResultado();

        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY id DESC
                LIMIT :limit OFFSET :offset', "adms_sit_id=1&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
