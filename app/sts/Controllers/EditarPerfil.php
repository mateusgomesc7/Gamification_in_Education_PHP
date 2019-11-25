<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class EditarPerfil
{

    private $Dados;

    public function altPerfil()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['EdiPerfil'])) {
            unset($this->Dados['EdiPerfil']);
            $this->Dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            $altPerfilBd = new \App\sts\Models\StsEditarPerfil();
            $altPerfilBd->altPerfil($this->Dados);
            if ($altPerfilBd->getResultado()) {
                $UrlDestino = URL . 'ver-perfil/perfil';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $this->altPerfilPriv();
            }
        } else {
            $verPerfil = new \App\sts\Models\StsVerPerfil();
            $this->Dados['form'] = $verPerfil->verPerfil();
            $this->altPerfilPriv();
        }
    }

    private function altPerfilPriv()
    {
        $listarMenu = new \App\sts\Models\StsMenu();
        $this->Dados['menu'] = $listarMenu->itemMenu();
        $carregarView = new \Core\ConfigView("sts/Views/usuario/editPerfil", $this->Dados);
        $carregarView->renderizar();
    }

}