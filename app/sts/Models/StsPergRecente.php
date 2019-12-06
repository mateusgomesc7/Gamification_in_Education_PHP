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
                ORDER BY id DESC
                LIMIT :limit', "adms_sit_id=1&limit=7");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

}
