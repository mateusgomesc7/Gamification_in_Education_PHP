<?php

namespace App\adms\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class AdmsLogin
{

    private $Dados;
    private $Resultado;

    function getResultado()
    {
        return $this->Resultado;
    }

    public function acesso(array $Dados)
    {
        $this->Dados = $Dados;
        $this->validarDados();
        if ($this->Resultado) {
            $validaLogin = new \App\adms\Models\helper\AdmsRead();
            $validaLogin->fullRead("SELECT user.id, user.nome, user.email, user.senha, user.imagem, user.adms_niveis_acesso_id,
                    nivac.ordem	ordem_nivac
                    FROM adms_usuarios user
                    INNER JOIN adms_niveis_acessos nivac ON nivac.id=user.adms_niveis_acesso_id
                    WHERE usuario =:usuario LIMIT :limit", "usuario={$this->Dados['usuario']}&limit=1");
            $this->Resultado = $validaLogin->getResultado();
            if (!empty($this->Resultado)) {
                $this->validarSenha();
            } else {
                $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
                $this->Resultado = false;
            }
        }
    }

    private function validarDados()
    {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);
        if (in_array('', $this->Dados)) {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Necessário preencher todos os campos!</div>";
            $this->Resultado = false;
        } else {
            $this->Resultado = true;
        }
    }

    private function validarSenha()
    {
        if (password_verify($this->Dados['senha'], $this->Resultado[0]['senha'])) {
            $_SESSION['adms_usuario_id'] = $this->Resultado[0]['id'];
            $_SESSION['adms_usuario_nome'] = $this->Resultado[0]['nome'];
            $_SESSION['adms_usuario_email'] = $this->Resultado[0]['email'];
            $_SESSION['adms_usuario_imagem'] = $this->Resultado[0]['imagem'];
            $_SESSION['adms_niveis_acesso_id'] = $this->Resultado[0]['adms_niveis_acesso_id'];
            $_SESSION['adms_ordem_nivac'] = $this->Resultado[0]['ordem_nivac'];
            $this->Resultado = true;
        } else {
            $_SESSION['adms_msg'] = "<div class='alert alert-danger'>Erro: Usuário ou a senha incorreto!</div>";
            $this->Resultado = false;
        }
    }

}
