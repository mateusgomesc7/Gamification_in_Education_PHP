<?php

namespace Core;

class ConfigView
{

    private $Nome;
    private $Dados;

    public function __construct($Nome, array $Dados = null)
    {
        $this->Nome = (string) $Nome;
        $this->Dados = $Dados;
    }

    public function renderizar()
    {
        include 'app/sts/Views/include/cabecalho_sts.php';
        include 'app/sts/Views/include/header.php';
        // include 'app/sts/Views/include/sidebar.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        }else{
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
        include 'app/sts/Views/include/rodape_sts.php';
    }

    public function renderizarLogin()
    {
        include 'app/sts/Views/include/cabecalho.php';
        if (file_exists('app/' . $this->Nome . '.php')) {
            include 'app/' . $this->Nome . '.php';
        }else{
            echo "Erro ao carregar a Página: {$this->Nome}";
        }
    }

}