<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsComentarios
{

    private $Resultado;
    private $IdPergunta;
    private $Dados;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function listComentario($IdPergunta = null)
    {
        $this->IdPergunta = (string) $IdPergunta;
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT comt.id, comt.conteudo,
                user.id id_user, user.nome, user.imagem imagem_user
                FROM sts_comts_perguntas comt
                INNER JOIN sts_usuarios user ON user.id=comt.sts_usuario_id
                WHERE comt.sts_pergunta_id =:sts_pergunta_id AND
                (comt.adms_sit_id =:adms_sit_ida OR comt.adms_sit_id =:adms_sit_idb)           
                ORDER BY comt.id DESC', "sts_pergunta_id={$this->IdPergunta}&adms_sit_ida=1&adms_sit_idb=3");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }

    public function cadComentario(array $Dados)
    {
        $this->Dados = $Dados;
        $this->validarDados();
        if ($this->Resultado) {
            // $this->verUsuario();
            if($this->Resultado){
                unset($this->Dados['nome'],$this->Dados['email'], $this->Dados['id']);
                $this->Dados['sts_usuario_id'] = $_SESSION['usuario_id'];
                $this->Dados['adms_sit_id'] = 3;
                $this->Dados['created'] = date("Y-m-d H:i:s");
                //var_dump($this->Dados);
                $this->inserir();
            }
        }
    }

    private function validarDados()
    {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);
        if (in_array('', $this->Dados)) {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Para enviar o comentário preencha o campo!</div>";
            $this->Resultado = false;
        } else {
            $this->Resultado = true;
        }

        // else {
        //     if (filter_var($this->Dados['email'], FILTER_VALIDATE_EMAIL)) {
        //         $this->Resultado = true;
        //     } else {
        //         $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: E-mail inválido!</div>";
        //         $this->Resultado = false;
        //     }
        // }
    }

    private function inserir()
    {
        $cadComent = new \App\sts\Models\helper\StsCreate();
        $cadComent->exeCreate('sts_comts_perguntas', $this->Dados);
        if ($cadComent->getResultado()) {

            $ganharPontos = new \App\sts\Models\StsAdicionarPontuacao();
            
            if($ganharPontos->pontosPorResposta()){
                $ganhoDePontos = $ganharPontos->getGanhoDePontos();
                $_SESSION['msg'] = "<div class='alert alert-success'>Você ganhou um novo Emblema e $ganhoDePontos pontos!</div>";
            }else{
                $ganhoDePontos = $ganharPontos->getGanhoDePontos();
                $_SESSION['msg'] = "<div class='alert alert-success'>Você ganhou $ganhoDePontos pontos!</div>";
                $ganhoDePontos = $ganharPontos->getGanhoDePontos();
            }
            
            
            $this->Resultado = true;
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Comentário não foi cadastrado!</div>";
            $this->Resultado = false;
        }
    }

    private function verUsuario()
    {
        $verUsuario = new \App\sts\Models\helper\StsRead();
        $verUsuario->fullRead("SELECT id FROM sts_usuarios
                WHERE email =:email LIMIT :limit ", "email={$this->Dados['email']}&limit=1");
        $this->UserId = $verUsuario->getResultado();
        if ($this->UserId) {
            $this->Dados['sts_usuario_id'] = $this->UserId[0]['id'];
            $this->Resultado = true;
        } else {
            $this->inserirUsuario();
        }
    }

    private function inserirUsuario()
    {
        $this->DadosUser['nome'] = $this->Dados['nome'];
        $this->DadosUser['email'] = $this->Dados['email'];
        $this->DadosUser['usuario'] = $this->Dados['email'];
        $this->DadosUser['senha'] = password_hash(password_hash(date("Y-m-d H:i:s"), PASSWORD_DEFAULT), PASSWORD_DEFAULT);
        $this->DadosUser['sts_niveis_acesso_id'] = 5;
        $this->DadosUser['sts_sits_usuario_id'] = 3;
        $this->DadosUser['created'] = date("Y-m-d H:i:s");

        $cadUsuario = new \App\sts\Models\helper\StsCreate();
        $cadUsuario->exeCreate("sts_usuarios", $this->DadosUser);
        if ($cadUsuario->getResultado()) {
            $this->Dados['sts_usuario_id'] = $cadUsuario->getResultado();
            $this->Resultado = $cadUsuario->getResultado();
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: O usuario não foi cadastrado!</div>";
            $this->Resultado = false;
        }
    }

}
