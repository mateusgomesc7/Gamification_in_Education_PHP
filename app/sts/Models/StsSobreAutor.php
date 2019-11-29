<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsSobreAutor
{
    private $Resultado;
    
    public function sobreAutor()
    {
        $visSobreAutor = new \App\sts\Models\helper\StsRead();
        $visSobreAutor->fullRead('SELECT id, titulo, descricao, imagem FROM sts_sobres 
                WHERE sts_sit_id =:sts_sit_id 
                AND id =:id 
                LIMIT :limit', "sts_sit_id=1&id=1&limit=1");
        $this->Resultado = $visSobreAutor->getResultado();
        return $this->Resultado;
    }
}
