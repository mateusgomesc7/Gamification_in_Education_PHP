<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

/**
 * Description of StsEditarTipoPgSite
 *
 * @copyright (c) year, Cesar Szpak - Celke
 */
class StsEditarTipoPgSite
{

    private $Resultado;
    private $Dados;
    private $DadosId;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function verTipoPgSite($DadosId)
    {
        $this->DadosId = (int) $DadosId;
        $verTipoPg = new \App\adms\Models\helper\AdmsRead();
        $verTipoPg->fullRead("SELECT * FROM sts_tps_pgs
                WHERE id =:id LIMIT :limit", "id=" . $this->DadosId . "&limit=1");
        $this->Resultado = $verTipoPg->getResultado();
        return $this->Resultado;
    }

    public function altTipoPgSite(array $Dados)
    {
        $this->Dados = $Dados;

        $valCampoVazio = new \App\adms\Models\helper\AdmsCampoVazio;
        $valCampoVazio->validarDados($this->Dados);

        if ($valCampoVazio->getResultado()) {
            $this->updateEditTipoPg();
        } else {
            $this->Resultado = false;
        }
    }

    private function updateEditTipoPg()
    {
        $this->Dados['modified'] = date("Y-m-d H:i:s");
        $upAltTipoPg = new \App\adms\Models\helper\AdmsUpdate();
        $upAltTipoPg->exeUpdate("sts_tps_pgs", $this->Dados, "WHERE id =:id", "id=" . $this->Dados['id']);
        if ($upAltTipoPg->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Tipo de página atualizado com sucesso!</div>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Tipo de página não foi atualizado!</div>";
            $this->Resultado = false;
        }
    }
    

}
