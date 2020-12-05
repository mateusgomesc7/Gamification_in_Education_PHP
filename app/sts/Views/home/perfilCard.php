<div class="card text-center p-4 justify-content-center my-3">
    <?php
    $nome = explode(" ", $_SESSION['usuario_nome']);
    $prim_nome = $nome[0];
    echo "<h5 class='card-title'>$prim_nome</h5>";
    ?>

    <?php if (isset($_SESSION['usuario_imagem']) and (!empty($_SESSION['usuario_imagem']))) { ?>

        <img class="img" id="imgPerfil" src="<?php echo URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" alt="Imagem de capa do card">

    <?php } else { ?>

        <img class="img" id="imgPerfil" src="<?php echo URL . 'assets/imagens/usuario/icone_usuario.png'; ?>" alt="Imagem de capa do card">

    <?php
    }
    ?>
    <div class="card-body p-0">
        <?php
        echo "<div class='row no-gutters'>";
        echo "<div class='col-3'>";
        echo "<div class='card text-white text-center' style='background-color: #007bff !important;'>";
        echo "<h6 class='card-title m-0 text-uppercase'><small>Nível</small></h6>";
        foreach ($this->Dados['nivel'] as $nivel) {
            extract($nivel);

            echo "<div class='card-body p-0 m-0 h4'>" . $id . "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "<div class='col-9 d-flex flex-column justify-content-center'>";
        echo "<div class='progress'>";
        foreach ($this->Dados['pontosAtual'] as $pontosAtual) {
            extract($pontosAtual);
            $quantPontosAnterior = $quant_pontos;
            foreach ($this->Dados['pontosProxNivel'] as $pontosProxNivel) {
                extract($pontosProxNivel);
                $quantPontosMax = $quant_pontos - $quantPontosAnterior;
                $porcentagem = (($pontos - $quantPontosAnterior) / $quantPontosMax) * 100;
                echo "<div 
                class='progress-bar' role='progressbar' 
                style='width: " . $porcentagem . "%;' 
                aria-valuenow='" . $porcentagem . "' 
                aria-valuemin='0' 
                aria-valuemax='" . $quantPontosMax . "'>";
                if ($porcentagem >= 30) {
                    echo $pontos;
                }
                echo "</div>
                <div class='text-primary font-weight-bold'>";
                if ($porcentagem < 30) {
                    echo $pontos;
                }
                echo "</div>";
            }
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";

        echo "<div class='row no-gutters'>";
        foreach ($this->Dados['emblemasPontos'] as $emblemasPontos) {
            extract($emblemasPontos);

            echo "<div class='col-3 mb-2'>";
            echo "<button type='button' class='btn btn-sm btn-$cor w-75' data-toggle='popover' data-placement='top' title='$nome' data-content='$descricao'><i class='$icone'></i></button>";
            echo "</div>";
        }
        echo "</div>";

        ?>
    </div>
</div>