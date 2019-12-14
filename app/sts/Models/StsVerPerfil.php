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
        $verPerfil->fullRead("SELECT user.id, user.nome, user.curso1, user.email, user.usuario, user.imagem
                            FROM sts_usuarios user
                            WHERE user.id =:id 
                            LIMIT :limit", "id=" . $_SESSION['usuario_id'] . "&limit=1");
        $this->Resultado = $verPerfil->getResultado();
        return $this->Resultado;
    }

    public function listarCursos(){
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead("SELECT id id_curso, nome nome_curso1, icone icone_curso FROM sts_cats_perguntas ORDER BY nome ASC");
        $registro['curso1'] = $listar->getResultado();
        $this->Resultado = ['curso1' => $registro['curso1']];
        return $this->Resultado;
    }

}