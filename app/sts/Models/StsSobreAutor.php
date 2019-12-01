<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsSobreAutor
{
    private $Resultado;
    private $IdPergunta;
    private $IdAutor;
    
    public function sobreAutor($IdPergunta)
    {
        $this->IdPergunta = $IdPergunta; 
        $this->buscarAutor();

        $visSobreAutor = new \App\sts\Models\helper\StsRead();
        $visSobreAutor->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobres 
                WHERE adms_sit_id =:adms_sit_id 
                AND id =:id 
                LIMIT :limit', "adms_sit_id=1&id={$this->IdAutor}&limit=1");
        $this->Resultado = $visSobreAutor->getResultado();
        return $this->Resultado;
    }

    public function buscarAutor(){

        $Autor = new \App\sts\Models\helper\StsRead();
        $Autor->fullRead('SELECT sts_usuario_id from sts_perguntas 
                WHERE id=:id',"id={$this->IdPergunta}");

        $this->IdAutor = $Autor->getResultado()[0]["sts_usuario_id"];
    }
}
