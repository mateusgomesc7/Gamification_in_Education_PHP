<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsUsuarios
{

    private $Resultado;
    
    public function listarUsuarios()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT id, usuario FROM sts_usuarios
        ORDER BY RAND()
        LIMIT :limit', "limit=3");

        $this->Resultado = $listar->getResultado();

        return $this->Resultado;
    }

}
