<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsRanking
{
    private $Resultado;
    private $LimiteResultado = 5;

    public function buscarMaioresPontos()
    {
        $emblemas = new \App\sts\Models\helper\StsRead();
        $emblemas->fullRead(' SELECT id, nome, pontos, imagem
        FROM sts_usuarios
        WHERE (sts_sits_usuario_id =:sts_sits_usuario_ida OR sts_sits_usuario_id =:sts_sits_usuario_idb)
        ORDER BY pontos DESC
        LIMIT :limit', "sts_sits_usuario_ida=1&sts_sits_usuario_idb=3&limit={$this->LimiteResultado}");
        
        $this->Resultado = $emblemas->getResultado();
        return $this->Resultado;
    }
}