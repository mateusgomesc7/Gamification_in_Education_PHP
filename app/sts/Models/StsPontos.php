<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPontos
{
    private $Resultado;

    public function verPotuacaoAtual(){
        $pontos = new \App\sts\Models\helper\StsRead();
        $pontos->fullRead('SELECT pontos 
                        FROM sts_usuarios
                        WHERE id =:id
                        LIMIT :limit', "id={$_SESSION['usuario_id']}&limit=1");
        $this->Resultado = $pontos->getResultado();
        return $this->Resultado;
    }
}