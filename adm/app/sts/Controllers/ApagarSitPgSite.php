<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarSitPgSite
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ApagarSitPgSite
{

    private $DadosId;

    public function apagarSitPgSite($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
           $apagarSitPgSite = new \App\sts\Models\StsApagarSitPgSite();
           $apagarSitPgSite->apagarSitPgSite($this->DadosId);
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar uma situação de pagina do site!</div>";
        }
        $UrlDestino = URLADM . 'sit-pg-site/listar';
        header("Location: $UrlDestino");
    }

}
