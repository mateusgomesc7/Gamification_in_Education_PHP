<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsEditarPerfil
{

    private $Resultado;
    private $Dados;
    private $Foto;
    private $ImgAntiga;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function altPerfil(array $Dados)
    {
        $this->Dados = $Dados;
        //var_dump($this->Dados);
        $this->Foto = $this->Dados['imagem_nova'];
        $this->ImgAntiga = $this->Dados['imagem_antiga'];
        unset($this->Dados['imagem_nova'], $this->Dados['imagem_antiga']);

        $valCampoVazio = new \App\sts\Models\helper\StsCampoVazio;
        $valCampoVazio->validarDados($this->Dados);

        if ($valCampoVazio->getResultado()) {
            $this->valCampos();
        } else {
            $this->Resultado = false;
        }
    }

    private function valCampos()
    {
        $valEmail = new \App\sts\Models\helper\StsEmail();
        $valEmail->valEmail($this->Dados['email']);

        $valEmailUnico = new \App\sts\Models\helper\StsEmailUnico();
        $EditarUnico = true;
        $valEmailUnico->valEmailUnico($this->Dados['email'], $EditarUnico, $_SESSION['usuario_id']);

        $valUsuario = new \App\sts\Models\helper\StsValUsuario();
        $valUsuario->valUsuario($this->Dados['usuario'], $EditarUnico, $_SESSION['usuario_id']);

        if (( $valUsuario->getResultado()) AND ( $valEmailUnico->getResultado()) AND ( $valEmail->getResultado())) {
            $this->valFoto();
        } else {
            $this->Resultado = false;
        }
    }

    private function valFoto()
    {
        if (empty($this->Foto['name'])) {
            $this->updateEditPerfil();
        } else {
            $slugImg = new \App\sts\Models\helper\StsSlug();
            $this->Dados['imagem'] = $slugImg->nomeSlug($this->Foto['name']);

            $uploadImg = new \App\sts\Models\helper\StsUploadImgRed();
            $uploadImg->uploadImagem($this->Foto, 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/', $this->Dados['imagem'], 150, 150);
            if ($uploadImg->getResultado()) {
                $apagarImg = new \App\sts\Models\helper\StsApagarImg();
                $apagarImg->apagarImg('assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $this->ImgAntiga);
                $this->updateEditPerfil();
            } else {
                $this->Resultado = false;
            }
        }
    }

    private function updateEditPerfil()
    {
        $this->Dados['modified'] = date("Y-m-d H:i:s");
        $upAltSenha = new \App\sts\Models\helper\StsUpdate();
        $upAltSenha->exeUpdate("sts_usuarios", $this->Dados, "WHERE id =:id", "id=" . $_SESSION['usuario_id']);
        if ($upAltSenha->getResultado()) {
            $_SESSION['usuario_nome'] = $this->Dados['nome'];
            $_SESSION['usuario_email'] = $this->Dados['email'];
            $_SESSION['usuario_imagem'] = $this->Dados['imagem'];
            $_SESSION['msg'] = "<div class='alert alert-success'>Perfil atualizado com sucesso!</div>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O perfil não foi atualizado!</div>";
            $this->Resultado = false;
        }
    }

}