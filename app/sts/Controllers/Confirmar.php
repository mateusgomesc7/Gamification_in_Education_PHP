<?php

namespace App\sts\Controllers;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class Confirmar
{

    private $DadosChave;

    public function confirmarEmail()
    {
        $this->DadosChave = filter_input(INPUT_GET, 'chave', FILTER_SANITIZE_STRING);
        if (!empty($this->DadosChave)) {
            $confEmail = new \App\sts\Models\StsConfirmarEmail();
            $confEmail->confirmarEmail($this->DadosChave);
            if ($confEmail->getResultado()) {
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            } else {
                $UrlDestino = URL . 'login/acesso';
                header("Location: $UrlDestino");
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Link de confirmação inválido!</div>";
            $UrlDestino = URL . 'login/acesso';
            header("Location: $UrlDestino");
        }
    }

}
