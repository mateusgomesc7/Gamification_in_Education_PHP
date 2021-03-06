<?php

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsVerPerfil
{

    private $Resultado;

    public function verPerfil()
    {
        $verPerfil = new \App\adms\Models\helper\AdmsRead();
        $verPerfil->fullRead("SELECT * FROM adms_usuarios WHERE id =:id LIMIT :limit", "id=" . $_SESSION['adms_usuario_id'] . "&limit=1");
        $this->Resultado = $verPerfil->getResultado();
        return $this->Resultado;
    }

}
