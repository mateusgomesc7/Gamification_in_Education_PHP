<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class PesqPerguntas
{
    private $Dados;
    private $DadosForm;
    private $PageId;

    public function listar($PageId = null){
        
        $this->DadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($this->DadosForm['PesqPergunta'])){
            unset($this->DadosForm['PesqPergunta']);
        }else{
            $this->PageId = (int) $PageId ? $PageId : 1;
            $this->DadosForm['pergunta'] = filter_input(INPUT_GET, 'pergunta', FILTER_DEFAULT);
        }
        
        $listar_pergunta = new \App\sts\Models\StsPerguntaPesq();
        $this->Dados['pergunta'] = $listar_pergunta->pesquisarPerguntas($this->PageId, $this->DadosForm);
        $this->Dados['paginacao'] = $listar_pergunta->getResultadoPg();
        
        $listarPergRecente = new \App\sts\Models\StsPergRecente();
        $this->Dados['pergRecente'] = $listarPergRecente->listarPergRecente();

        $listarPergDestaque = new \App\sts\Models\StsPergDestaque();
        $this->Dados['pergDestaque'] = $listarPergDestaque->listarPergDestaque();
        
        $visSobreAutor = new \App\sts\Models\StsSobreAutor();
        $this->Dados['sobreAutor'] = $visSobreAutor->sobreAutor(1);

        $carregarView = new \Core\ConfigView('sts/Views/pergunta/pesqPergunta', $this->Dados);
        $carregarView->renderizar();
        unset($_SESSION['pesqPergunta']);
    }
}