<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VerPerfil
{
    private $Dados;
    
    public function perfil()
    {
        $verPerfil = new \App\sts\Models\StsVerPerfil();
        $this->Dados['dados_perfil'] = $verPerfil->verPerfil();
        
        $listarMenu = new \App\sts\Models\StsMenu();
        $this->Dados['menu']= $listarMenu->itemMenu();

        $carregarView = new \Core\ConfigView("sts/Views/usuario/perfil", $this->Dados);
        $carregarView->renderizar();
    }
}