<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsBotao
{
    private $Resultado;
    private $Botao;
    private $BotaoValido = [];
   
    function getResultado()
    {
        return $this->Resultado;
    }

            
    public function valBotao(array $Botao)
    {
        $this->Botao = $Botao;
        foreach ($this->Botao as $key => $botao_unico) {
            extract($botao_unico);
            $verBotao = new \App\sts\Models\helper\StsRead();
            $verBotao->fullRead("SELECT pg.id id_pg
                    FROM sts_paginas pg
                    LEFT JOIN sts_nivacs_pgs nivpg ON nivpg.sts_pagina_id=pg.id
                    WHERE pg.menu_controller =:menu_controller
                    AND pg.menu_metodo =:menu_metodo
                    AND pg.sts_sits_pg_id = 1
                    AND nivpg.sts_niveis_acesso_id =:sts_niveis_acesso_id
                    AND nivpg.permissao= 1 LIMIT :limit", "menu_controller=$menu_controller&menu_metodo=$menu_metodo&sts_niveis_acesso_id=".$_SESSION['sts_niveis_acesso_id']."&limit=1");

            if($verBotao->getResultado()){
                $this->BotaoValido[$key] = true;
            }else{
                $this->BotaoValido[$key] = false;
            }
        }    
        return $this->BotaoValido;
    }
}
