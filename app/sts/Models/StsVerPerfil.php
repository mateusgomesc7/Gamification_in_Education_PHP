<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsVerPerfil
{

    private $Resultado;

    public function verPerfil()
    {
        $verPerfil = new \App\sts\Models\helper\StsRead();
        $verPerfil->fullRead("SELECT * FROM sts_usuarios WHERE id =:id LIMIT :limit", "id=" . $_SESSION['usuario_id'] . "&limit=1");
        $this->Resultado = $verPerfil->getResultado();
        return $this->Resultado;
    }

}