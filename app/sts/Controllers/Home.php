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
        
        $listarPergRecente = new \App\sts\Models\StsPergRecente();
        $this->Dados['pergRecente'] = $listarPergRecente->listarPergRecente();

        $listarPergDestaque = new \App\sts\Models\StsPergDestaque();
        $this->Dados['pergDestaque'] = $listarPergDestaque->listarPergDestaque();

        $listarCatPerg = new \App\sts\Models\StsCatPerg();
        $this->Dados['catPerguntas'] = $listarCatPerg->listarCatPerg();

        $pontuacao = new \App\sts\Models\StsPontos();
        $this->Dados['pontosAtual'] = $pontuacao->verPotuacaoAtual();

        $emblemas = new \App\sts\Models\StsEmblemas();
        $this->Dados['emblemasPontos'] = $emblemas->buscarEmblemas(); 
        
        $ranking = new \App\sts\Models\StsRanking();
        $this->Dados['ranking'] = $ranking->buscarMaioresPontos();

        $carregarView = new \Core\ConfigView("sts/Views/home/home", $this->Dados);
        $carregarView->renderizar();
    }

}