<?php

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarGrupoPg
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ApagarGrupoPg
{

    private $DadosId;

    public function apagarGrupoPg($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
           $apagarGrupoPg = new \App\adms\Models\AdmsApagarGrupoPg();
           $apagarGrupoPg->apagarGrupoPg($this->DadosId);
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um grupo de página!</div>";
        }
        $UrlDestino = URLADM . 'grupo-pg/listar';
        header("Location: $UrlDestino");
    }

}
