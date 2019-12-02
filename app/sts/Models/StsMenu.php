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
                FROM adms_nivacs_pgs nivpg
                INNER JOIN adms_menus men ON men.id=nivpg.adms_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
                WHERE nivpg.sts_niveis_acesso_id =:sts_niveis_acesso_id
                AND nivpg.permissao =:permissao
                AND nivpg.lib_menu =:lib_menu
                ORDER BY men.ordem, nivpg.ordem ASC", "sts_niveis_acesso_id=".$_SESSION['sts_niveis_acesso_id']."&permissao=1&lib_menu=1");
        $this->Resultado = $listItemMenu->getResultado();
        return $this->Resultado;
    }

    public function listarMenu()
    {
        $listar = new \App\sts\Models\helper\StsRead();
        $listar->fullRead('SELECT endereco, nome_pagina FROM sts_paginas
                WHERE lib_bloq =:lib_bloq 
                AND sts_situacaos_pg_id =:sts_situacaos_pg_id
                ORDER BY ordem ASC', "lib_bloq=1&sts_situacaos_pg_id=1");
        $this->Resultado = $listar->getResultado();
        return $this->Resultado;
    }
}