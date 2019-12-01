<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class CadastrarPergunta
{

    private $Dados;

    public function cadPergunta()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if (!empty($this->Dados['CadPergunta'])) {
            unset($this->Dados['CadPergunta']);
            // $this->Dados['imagem_nova'] = ($_FILES['imagem_nova'] ? $_FILES['imagem_nova'] : null);
            // var_dump($this->Dados['imagem_nova']);
            $cadPergunta = new \App\sts\Models\StsCadastrarPergunta();
            $cadPergunta->cadPergunta($this->Dados);
            if ($cadPergunta->getResultado()) {
                $UrlDestino = URL . 'home/index';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $this->cadPerguntaViewPriv();
            }
        } else {
            $this->cadPerguntaViewPriv();
        }
    }

    private function cadPerguntaViewPriv()
    {
        $listarSelect = new \App\sts\Models\StsCadastrarPergunta();
        $this->Dados['select'] = $listarSelect->listarCadastrar();
       
        $botao = ['list_art' => ['menu_controller' => 'pergunta', 'menu_metodo' => 'listar'],
                'edit_autor_art' => ['menu_controller' => 'editar-autor-pergunta', 'menu_metodo' => 'edit-autor-pergunta']];
        $listarBotao = new \App\sts\Models\StsBotao();
        $this->Dados['botao'] = $listarBotao->valBotao($botao);
        
        $listarMenu = new \App\sts\Models\StsMenu();
        $this->Dados['menu'] = $listarMenu->itemMenu();
        
        $carregarView = new \Core\ConfigView("sts/Views/pergunta/cadPergunta", $this->Dados);
        $carregarView->renderizar();
    }

}
