<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AtualSenha
{

    private $Chave;
    private $Dados;

    public function atualSenha()
    {
        $this->Chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Chave)) {
            $validaChave = new \App\sts\Models\StsAtualSenha();
            $validaChave->valChave($this->Chave);
            if ($validaChave->getResultado()) {
                $this->atualSenhaPriv();
            } else {
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link inválido!</div>";
            $UrlDestino = URL . 'login/acesso';
            header("Location: $UrlDestino");
        }
    }

    private function atualSenhaPriv()
    {
        if (!empty($this->Dados['AtualSenha'])) {
            unset($this->Dados['AtualSenha']);
            $this->Dados['recuperar_senha'] = $this->Chave;
            $atualSenha = new \App\sts\Models\StsAtualSenha();
            $atualSenha->atualSenha($this->Dados);
            if ($atualSenha->getResultado()) {
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            } else {
                $carregarView = new \Core\ConfigView("sts/Views/login/atualSenha", $this->Dados);
                $carregarView->renderizarLogin();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/login/atualSenha", $this->Dados);
            $carregarView->renderizarLogin();
        }
    }

}
