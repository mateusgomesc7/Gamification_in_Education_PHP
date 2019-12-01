<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VerPerguntas 
{
    private $Dados;
    private $PageId;

    public function perguntas()
    {
        
        // Não ta sendo utilizado. Seria para os menus que ficam em cima da página
        // $listarMenu = new \Sts\Models\StsMenu();
        // $this->Dados['menu'] = $listarMenu->listarMenu();

        // Não ta sendo utilizado.
        // $listarSeo = new \Sts\Models\StsSeo();
        // $this->Dados['seo'] = $listarSeo->listarSeo();
        
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;

        $listar_art = new \App\sts\Models\StsPerguntas();
        $this->Dados['perguntas'] = $listar_art->listarPerguntas($this->PageId);
        $this->Dados['paginacao'] = $listar_art->getResultadoPg();

        $listarPergRecente = new \App\sts\Models\StsPergRecente();
        $this->Dados['pergRecente'] = $listarPergRecente->listarPergRecente();

        $listarPergDestaque = new \App\sts\Models\StsPergDestaque();
        $this->Dados['pergDestaque'] = $listarPergDestaque->listarPergDestaque();

        $visSobreAutor = new \App\sts\Models\StsSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor();
        
        
        $carregarView = new \Core\ConfigView("sts/Views/pergunta/perguntas", $this->Dados);
        $carregarView->renderizar();
    }
}
