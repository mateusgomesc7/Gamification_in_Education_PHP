<?php

namespace App\adms\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarNivAc
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ApagarNivAc
{

    private $DadosId;

    public function apagarNivAc($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
           $apagarNivAc = new \App\adms\Models\AdmsApagarNivAc();
           $apagarNivAc->apagarNivAc($this->DadosId);
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um nível de acesso!</div>";
        }
        $UrlDestino = URLADM . 'nivel-acesso/listar';
        header("Location: $UrlDestino");
    }

}
