<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of ApagarSobEmpresa
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class ApagarSobEmpresa
{

    private $DadosId;

    public function apagarSobEmpresa($DadosId = null)
    {
        $this->DadosId = (int) $DadosId;
        if (!empty($this->DadosId)) {
           $apagarSobEmpresa = new \App\sts\Models\StsApagarSobEmpresa();
           $apagarSobEmpresa->apagarSobEmpresa($this->DadosId);
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário selecionar um tópico sobre empresa!</div>";
        }
        $UrlDestino = URLADM . 'sob-empresa/listar';
        header("Location: $UrlDestino");
    }

}
