<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Pergunta
{

    private $Dados;
    private $IdPergunta;

    public function pergunta($IdPergunta = null)
    {
        $listarMenu = new \App\sts\Models\StsMenu();
        $this->Dados['menu'] = $listarMenu->listarMenu();

        $this->IdPergunta = (string) $IdPergunta;
        //echo "<br><br><br>{$this->IdPergunta}";

        $visualizarPerg = new \App\sts\Models\StsPergunta();
        $this->Dados['sts_perguntas'] = $visualizarPerg->visualizarPergunta($this->IdPergunta);

        $listarPergRecente = new \App\sts\Models\StsPergRecente();
        $this->Dados['pergRecente'] = $listarPergRecente->listarPergRecente();

        $listarPergDestaque = new \App\sts\Models\StsPergDestaque();
        $this->Dados['pergDestaque'] = $listarPergDestaque->listarPergDestaque();

        $visSobreAutor = new \App\sts\Models\StsSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor($this->IdPergunta);

        $listarSeo = new \App\sts\Models\StsSeo();
        $this->Dados['seo'] = $listarSeo->listarSeo();

        if (!empty($this->Dados['sts_perguntas'][0])) {
            $pergProxAnt = new \App\sts\Models\StsPergProxAnt();
            $this->Dados['pergProximo'] = $pergProxAnt->perguntaProximo($this->Dados['sts_perguntas'][0]['id']);
            $this->Dados['pergAnterior'] = $pergProxAnt->perguntaAnterior($this->Dados['sts_perguntas'][0]['id']);
            $this->Dados['seo'] = $listarSeo->listarSeo('sts_perguntas', 'slug', $this->IdPergunta);

            $listComent = new \App\sts\Models\StsComentarios();
            $this->Dados['sts_coment'] = $listComent->listComentario($this->Dados['sts_perguntas'][0]['id']);
        } else {
            $this->Dados['seo'] = $listarSeo->listarSeo();
        }

        $carregarView = new \Core\ConfigView('sts/Views/pergunta/pergunta', $this->Dados);
        $carregarView->renderizar();
    }

}
