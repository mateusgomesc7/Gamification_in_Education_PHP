<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class VerPerguntasEsp 
{
    private $Dados;
    private $PageId;

    public function perguntas()
    {
        
        $this->PageId = filter_input(INPUT_GET, 'pg', FILTER_SANITIZE_NUMBER_INT);
        $this->PageId = $this->PageId ? $this->PageId : 1;

        $listar_pergunta = new \App\sts\Models\StsPergunta();
        $this->Dados['perguntas'] = $listar_pergunta->listarPerguntas($this->PageId);
        $this->Dados['paginacao'] = $listar_pergunta->getResultadoPg();

        $listarPergRecente = new \App\sts\Models\StsPergRecente();
        $this->Dados['pergRecente'] = $listarPergRecente->listarPergRecente();

        $listarPergDestaque = new \App\sts\Models\StsPergDestaque();
        $this->Dados['pergDestaque'] = $listarPergDestaque->listarPergDestaque();

        $visSobreAutor = new \App\sts\Models\StsSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor(1);

        $carregarView = new \Core\ConfigView('sts/Views/pergunta/perguntas', $this->Dados);
        $carregarView->renderizar();
    }
}
