<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class EsqueceuSenha
{

    private $Dados;

    public function esqueceuSenha()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['RecupUserLogin'])) {
            $esqSenha = new \App\sts\Models\stsEsqueceuSenha();
            $esqSenha->esqueceuSenha($this->Dados);
            if ($esqSenha->getResultado()) {                
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $carregarView = new \Core\ConfigView("sts/Views/login/esqueceuSenha", $this->Dados);
                $carregarView->renderizarLogin();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/login/esqueceuSenha", $this->Dados);
            $carregarView->renderizarLogin();
        }
    }

}
