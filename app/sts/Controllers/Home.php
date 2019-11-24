<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Home
{
    
    private $Dados;

    public function index()
    {
        $listarMenu = new \App\sts\Models\StsMenu();
        $this->Dados['menu']= $listarMenu->itemMenu();
        
        $carregarView = new \Core\ConfigView("sts/Views/home/home", $this->Dados);
        $carregarView->renderizar();
    }

}