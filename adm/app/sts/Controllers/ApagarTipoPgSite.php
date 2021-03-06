<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarTipoPgSite
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ApagarTipoPgSite
{

    private $DadosId;

    public function apagarTipoPgSite($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
           $apagarTipoPg = new \App\sts\Models\StsApagarTipoPgSite();
           $apagarTipoPg->apagarTipoPgSite($this->DadosId);
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um tipo de página!</div>";
        }
        $UrlDestino = URLADM . 'tipo-pg-site/listar';
        header("Location: $UrlDestino");
    }

}
