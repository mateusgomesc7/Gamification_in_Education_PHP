<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPerguntas
{

    private $Resultado;
    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 2;

    function getResultadoPg()
    {
        return $this->ResultadoPg;
    }

    public function listarPerguntas($PageId = null)
    {
        $this->PageId = (int) $PageId;
        $paginacao = new \App\sts\Models\helper\StsPaginacao(URL . 'ver-perguntas/perguntas');
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
