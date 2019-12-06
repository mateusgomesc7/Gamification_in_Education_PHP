<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPerguntaCat
{
    private $Resultado;
    private $IdPergunta;

    private $IdCategoria;
    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 5;

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

    public function listarPerguntas($IdCategoria , $PageId = null)
    {
        $this->IdCategoria = $IdCategoria;
        $this->PageId = (int) $PageId;
        $paginacao = new \App\sts\Models\helper\StsPaginacao(URL . 'ver-perguntas-esp/categorias/' . $this->IdCategoria);
        $paginacao->condicao($this->PageId, $this->LimiteResultado);
        $paginacao->paginacao('SELECT COUNT(id) AS num_result
                FROM sts_perguntas
                WHERE adms_sit_id =:adms_sit_id 
                AND sts_cats_pergunta_id=:sts_cats_pergunta_id', "adms_sit_id=1&sts_cats_pergunta_id={$this->IdCategoria}");
        $this->ResultadoPg = $paginacao->getResultado();

        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, descricao, imagem, slug 
                FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id
                AND sts_cats_pergunta_id=:sts_cats_pergunta_id
                ORDER BY id DESC
                LIMIT :limit OFFSET :offset', "adms_sit_id=1&sts_cats_pergunta_id={$this->IdCategoria}&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
