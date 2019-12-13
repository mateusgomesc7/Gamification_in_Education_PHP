<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<div class="container">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div class="row">

        <div class="col-lg-2 d-none d-sm-none d-md-none d-lg-inline">
            <div class="btn-group-vertical">
                <a class="btn btn-outline-primary m-1" role="button" href="<?php echo URL . 'ver-perguntas/perguntas'; ?>">
                    <i class="fas fa-university"></i> Todas
                </a>

                <?php
                foreach ($this->Dados['catPerguntas'] as $catPerguntas) {
                    extract($catPerguntas);
                    echo "<a class='btn btn-outline-primary m-1' role='button' href='" . URL . "ver-perguntas-esp/categorias/$id'><i class='$icone'></i> $nome</a>";
                }
                ?>

            </div>
        </div>

        <div class="col-md-9 col-lg-7">
            <div class="row justify-content-center">
                <div class="card py-5 mb-0 bg-white container text-center">
                    <h1 class="display-4"><strong>Qual a sua dúvida?</strong></h1>
                    <hr class="my-4">

                    <a href="<?php echo URL . "cadastrar-pergunta/cad-pergunta"; ?>">
                        <button type="button" class="btn btn-primary btn-lg">Faça uma pergunta</button>
                    </a>

                </div>
            </div>
            <div class="row">
                <?php
                foreach ($this->Dados['pergRecente'] as $perguntaRec) {
                    extract($perguntaRec);

                    echo "<div class='card mb-1 p-0 container'>";
                    echo "<div class='card-header'>";
                    echo "<i class='$icone'></i> $categoria";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>$titulo</h5>";

                    // // echo $conteudo;
                    // $domain = strstr($conteudo, '</p', true);
                    // // echo $domain; 
                    // echo "<p class='card-text'>$domain</p></p>";

                    echo "<a href='" . URL . "pergunta/pergunta/$id' class='btn btn-primary'>Visualizar</a>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

        <div class="col-md-3 col-lg-3">
            <div class="row justify-content-center mb-2">
                <div class="card text-center p-4">
                    <img class="img" id="imgPerfil" src="<?php echo URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" alt="Imagem de capa do card">
                    <div class="card-body">
                        <?php
                        $nome = explode(" ", $_SESSION['usuario_nome']);
                        $prim_nome = $nome[0];
                        echo "<h5 class='card-title'>$prim_nome</h5>";

                        foreach ($this->Dados['pontosAtual'] as $pontosAtual) {
                            extract($pontosAtual);

                        echo "<p class='card-text'><small class='text-muted'>Pontos: " . $pontos . "</small></p>";
                        
                        }

                        foreach ($this->Dados['emblemasPontos'] as $emblemasPontos) {
                            extract($emblemasPontos);

                            echo "<button type='button' class='btn btn-sm btn-secondary p-auto' data-toggle='popover' title='$nome' data-content='$descricao'><i class='$icone'></i></button>";
                            echo "<button type='button' class='btn btn-sm btn-danger p-auto' data-toggle='popover' title='$nome' data-content='$descricao'><i class='$icone'></i></button>";
                            echo "<button type='button' class='btn btn-sm btn-primary p-auto                    ' data-toggle='popover' title='$nome' data-content='$descricao'><i class='$icone'></i></button>";
                        }
                        ?>
                    </div>
                </div>

            </div>
            
            
            <!-- Area de Ranking -->
            <div class="card text-center mb-4">
                <div class="card-header">
                    Ranking
                </div>
                <ol class="list-group list-group-flush list-unstyled">
                    <?php
                    foreach ($this->Dados['ranking'] as $ranking) {
                        extract($ranking);

                        echo "<li><a href='#'>$nome - $pontos</a></li>";
                    }
                    ?>
                </ol>
            </div>
            <!-- Fim da Area de Ranking -->

            <!-- Area de Destaque -->
            <div class="card">
                <div class="card-header">
                    Destaque
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                    foreach ($this->Dados['pergDestaque'] as $perguntaDest) {
                        extract($perguntaDest);
                        echo "<li class='list-group-item'><a href='" . URL . "pergunta/pergunta/$id'>$titulo</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- Fim da Area de Destaque -->
        </div>

    </div>