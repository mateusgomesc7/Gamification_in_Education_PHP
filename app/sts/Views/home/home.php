<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<div class="container">

    <div class="row pt-0">

        <!-- INICIO 1ª COLUNA -->
        <div class="col-lg-2 d-none d-sm-none d-md-none d-lg-inline">
            <!-- INICIO Categorias -->
            <div class="card text-center p-1 my-3">
                <div class="list-group">
                    <a type="button" class="list-group-item list-group-item-action" href="<?php echo URL . 'ver-perguntas/perguntas'; ?>">
                        <i class="fas fa-university"></i> Todas
                    </a>
                    <?php
                    foreach ($this->Dados['catPerguntas'] as $catPerguntas) {
                        extract($catPerguntas);
                        echo "<a class='list-group-item list-group-item-action' href='" . URL . "ver-perguntas-esp/categorias/$id'><i class='$icone'></i> $nome</a>";
                    }
                    ?>
                </div>
            </div>
            <!-- FIM Categorias -->
            
            <!-- INICIO Area de Destaque -->
            <div class="card">
                <div class="card-header">
                    Destaques
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                    foreach ($this->Dados['pergDestaque'] as $perguntaDest) {
                        extract($perguntaDest);
                        echo "<li class='list-group-item'><a href='" . URL . "pergunta/pergunta/$id'>$conteudo</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- FIM da Area de Destaque -->
        </div>
        <!-- FIM 1ª COLUNA -->

        <!-- INICIO 2ª COLUNA -->
        <div class="col-md-9 col-lg-7 px-5 center-column-home">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

            <div>
                <!-- INICIO QUAL A SUA DUVIDA -->
                <div class="row">
                    <div class="card py-5 mb-0 bg-white container container-show text-center">
                        <div class="card-body">
                            <h1 class="display-4"><strong>Qual a sua dúvida?</strong></h1>
                            <hr class="my-4">

                            <a href="<?php echo URL . "cadastrar-pergunta/cad-pergunta"; ?>" class="btn btn-primary btn-lg">
                                Faça uma pergunta
                            </a>
                        </div>
                    </div>
                </div>
                <!-- FIM QUAL A SUA DUVIDA -->

                <!-- INICIO Perguntas Recentes -->
                <div class="row">
                    <?php
                    foreach ($this->Dados['pergRecente'] as $perguntaRec) {
                        extract($perguntaRec);

                        echo "<div class='card mb-3 p-0 container container-show'>";
                        echo "<div class='card-header'>";
                        echo "<i class='$icone'></i> $categoria";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>$conteudo</h5>";

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
                <!-- FIM Perguntas Recentes -->
            </div>

        </div>
        <!-- FIM 2ª COLUNA -->

        <!-- INICIO 3ª COLUNA -->
        <div class="col-md-3 col-lg-3">
            <!-- INICIO Card do Perfil Usuário -->
            <?php include('app/sts/Views/home/perfilCard/perfilCard.php') ?>
            <!-- FIM Card do Perfil Usuário -->

            <!-- INICIO Area de Ranking -->
            <?php include('app/sts/Views/home/rankingCard/rankingCard.php') ?>
            <!-- FIM da Area de Ranking -->
        </div>
        <!-- FIM 3ª COLUNA -->

    </div>