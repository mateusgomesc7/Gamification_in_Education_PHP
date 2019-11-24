<?php

namespace App\sts\Models;

if (!defined('URL')) {
    header("Location: /");
    exit();
}

class StsMenu
{
    private $Resultado;
   
    function getResultado()
    {
        return $this->Resultado;
    }

    public function itemMenu()
    {
        $listItemMenu = new \App\sts\Models\helper\StsRead();
        $listItemMenu->fullRead("SELECT nivpg.dropdown,
                men.id id_men, men.nome nome_men, men.icone icone_men,
                pg.id id_pg, pg.menu_controller, pg.menu_metodo, pg.nome_pagina, pg.icone icone_pg
                FROM sts_nivacs_pgs nivpg
                INNER JOIN sts_menus men ON men.id=nivpg.sts_menu_id
                INNER JOIN sts_paginas pg ON pg.id=nivpg.sts_pagina_id
                WHERE nivpg.sts_niveis_acesso_id =:sts_niveis_acesso_id
                AND nivpg.permissao =:permissao
                AND nivpg.lib_menu =:lib_menu
                ORDER BY men.ordem, nivpg.ordem ASC", "sts_niveis_acesso_id=".$_SESSION['sts_niveis_acesso_id']."&permissao=1&lib_menu=1");
        $this->Resultado = $listItemMenu->getResultado();
        return $this->Resultado;
    }
}