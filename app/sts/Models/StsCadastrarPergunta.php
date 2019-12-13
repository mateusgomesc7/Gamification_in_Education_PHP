<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsCadastrarPergunta
{

    private $Resultado;
    private $Dados;
    private $Foto;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function cadPergunta(array $Dados)
    {
        $this->Dados = $Dados;
        // $this->Foto = $this->Dados['imagem_nova'];
        // unset($this->Dados['imagem_nova']);

        $valCampoVazio = new \App\sts\Models\helper\StsCampoVazioComTag;
        $valCampoVazio->validarDados($this->Dados);

        if ($valCampoVazio->getResultado()) {
            $this->inserirPergunta();
        } else {
            $this->Resultado = false;
        }
    }

    private function inserirPergunta()
    {   
        $this->Dados['created'] = date("Y-m-d H:i:s");
       
        // $slugImg = new \App\sts\Models\helper\StsSlug();
        // $this->Dados['imagem'] = $slugImg->nomeSlug($this->Foto['name']);
        
        // $slugPg = new \App\sts\Models\helper\StsSlug();
        // $this->Dados['slug'] = $slugPg->nomeSlug($this->Dados['slug']);

        // var_dump($this->Dados);

        $cadPergunta = new \App\sts\Models\helper\StsCreate;
        $cadPergunta->exeCreate("sts_perguntas", $this->Dados);
        if ($cadPergunta->getResultado()) {
            if (empty($this->Foto['name'])) {

                $ganharPontos = new \App\sts\Models\StsAdicionarPontuacao();
                $ganharPontos->pontosPorPergunta();
                $ganhoDePontos = $ganharPontos->getGanhoDePontos();

                $_SESSION['msg'] = "<div class='alert alert-success'>Pergunta cadastrada com sucesso! Você ganhou $ganhoDePontos pontos!</div>";
                $this->Resultado = true;
            } else {
                $this->Dados['id'] = $cadPergunta->getResultado();
                $this->valFoto();
            }
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Pergunta não foi cadastrado!</div>";
            $this->Resultado = false;
        }
    }
    
    private function valFoto()
    {
        $uploadImg = new \App\sts\Models\helper\StsUploadImgRed();
        $uploadImg->uploadImagem($this->Foto, '../assets/imagens/pergunta/' . $this->Dados['id'] . '/', $this->Dados['imagem'], 1200, 627);
        if ($uploadImg->getResultado()) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Pergunta cadastrado com sucesso. Upload da imagem realizado com sucesso!</div>";
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-info'>Erro: Pergunta cadastrado. Erro ao realizar o upload da imagem!</div>";
            $this->Resultado = false;
        }
    }

    public function listarCadastrar()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        
        $listar->fullRead("SELECT id id_rob, nome nome_rob, tipo tipo_rob FROM sts_robots ORDER BY nome ASC");        
        $registro['rob'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_user, nome nome_user FROM sts_usuarios ORDER BY nome ASC");
        $registro['user'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_sit, nome nome_sit FROM adms_sits ORDER BY nome ASC");
        $registro['sit'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_tpart, nome nome_tpart FROM sts_tps_perguntas ORDER BY nome ASC");
        $registro['tpart'] = $listar->getResultado();

        $listar->fullRead("SELECT id id_catart, nome nome_catart FROM sts_cats_perguntas ORDER BY nome ASC");
        $registro['catart'] = $listar->getResultado();

        $this->Resultado = ['rob' => $registro['rob'], 'user' => $registro['user'], 'sit' => $registro['sit'], 'tpart' => $registro['tpart'], 'catart' => $registro['catart']];

        return $this->Resultado;
    }

}
