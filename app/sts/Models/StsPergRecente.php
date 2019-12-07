<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsPergRecente
{

    private $Resultado;

    public function listarPergRecente()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT perg.id, perg.titulo, perg.conteudo, perg.sts_cats_pergunta_id,
                cape.nome categoria, cape.icone
                FROM sts_perguntas perg
                INNER JOIN sts_cats_perguntas cape ON cape.id=perg.sts_cats_pergunta_id
                WHERE perg.adms_sit_id =:adms_sit_id 
                AND (perg.sts_cats_pergunta_id =:curso1_usuario 
                OR perg.sts_cats_pergunta_id =:curso2_usuario
                OR perg.sts_cats_pergunta_id =:curso3_usuario)
                ORDER BY id DESC
                LIMIT :limit', 
                "adms_sit_id=1
                &curso1_usuario={$_SESSION['usuario_curso1']}
                &curso2_usuario={$_SESSION['usuario_curso2']}
                &curso3_usuario={$_SESSION['usuario_curso3']}
                &limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
