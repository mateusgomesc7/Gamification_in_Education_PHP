<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPerguntaPesq
{
    private $Dados;
    private $Resultado;
    private $IdPergunta;

    private $PageId;
    private $ResultadoPg;
    private $LimiteResultado = 10;

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

    public function pesquisarPerguntas($PageId = null, $Dados = null)
    {
        $this->PageId = (int) $PageId;
        $this->Dados = $Dados;
        
        $this->Dados['pergunta'] = trim($this->Dados['pergunta']);
        
        $_SESSION['pesqPergunta'] = $this->Dados['pergunta'];

        if(!empty($this->Dados['pergunta'])){
            
            $paginacao = new \App\sts\Models\helper\StsPaginacaoa(URL . 'pesq-perguntas/listar', '&?pergunta='.$this->Dados['pergunta']);
            $paginacao->condicao($this->PageId, $this->LimiteResultado);
            $paginacao->paginacao("SELECT COUNT(id) AS num_result
                    FROM sts_perguntas
                    WHERE adms_sit_id =:adms_sit_id
                    AND (titulo LIKE '%' :titulo '%' 
                    OR conteudo LIKE '%' :titulo '%')", 
                    "adms_sit_id=1&titulo={$this->Dados['pergunta']}");
            $this->ResultadoPg = $paginacao->getResultado();

            $listar = new \App\sts\Models\helper\StsRead();
            $listar->fullRead("SELECT id, titulo, conteudo
                            FROM sts_perguntas
                            WHERE adms_sit_id =:adms_sit_id
                            AND (titulo LIKE '%' :titulo '%'
                            OR conteudo LIKE '%' :titulo '%')
                            ORDER BY id DESC
                            LIMIT :limit OFFSET :offset", 
                            "adms_sit_id=1&titulo={$this->Dados['pergunta']}&limit={$this->LimiteResultado}&offset={$paginacao->getOffset()}");
            $this->Resultado = $listar->getResultado();
            return $this->Resultado;

        }
        
    }

}
