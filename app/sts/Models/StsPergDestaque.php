<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergDestaque
{
    private $Resultado;
    
    public function listarPergDestaque()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, titulo, conteudo FROM sts_perguntas 
                WHERE adms_sit_id =:adms_sit_id
                ORDER BY qnt_acesso DESC 
                LIMIT :limit', "adms_sit_id=1&limit=3");


        $this->Resultado = $listar->getResultado();
        // Colocando todos os conteudos das perguntas com o mínimo de palavras
        $QuantidadePalavras = 15;
        foreach ($this->Resultado as $key => $value) {
            $this->Resultado[$key]["conteudo"] = $this->comecoConteudo($this->Resultado[$key]["conteudo"], $QuantidadePalavras);
        }

        return $this->Resultado;
    }

    private function comecoConteudo($StringConteudo, $QuantPalavras)
    {
        $StringSemTags = strip_tags($StringConteudo);
        
        $ArraysemEspaco = explode(" ", $StringSemTags);

        $ArrayPrimeirasPalavras = array_slice($ArraysemEspaco, 0, $QuantPalavras);

        $StringComEspacos = implode(" ", $ArrayPrimeirasPalavras);

        return $StringComEspacos . " ...";
    }
}
