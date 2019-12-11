<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class NovoUsuario
{

    private $Dados;

    public function novoUsuario()
    {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['CadUserLogin'])) {
            unset($this->Dados['CadUserLogin']);
            $cadUser = new \App\sts\Models\StsNovoUsuario();
            $cadUser->cadUser($this->Dados);
            if ($cadUser->getResultado()) {
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            } else {
                $this->Dados['form'] = $this->Dados;
                $carregarView = new \Core\ConfigView("sts/Views/login/novoUsuario", $this->Dados);
                $carregarView->renderizarLogin();
            }
        } else {
            $carregarView = new \Core\ConfigView("sts/Views/login/novoUsuario", $this->Dados);
            $carregarView->renderizarLogin();
        }
    }

}
