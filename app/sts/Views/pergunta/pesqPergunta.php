<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<main role="main">

        <div class="container">
            <h2 class="display-4 text-center my-3" style="margin-bottom: 40px;">Pesquisar Perguntas</h2>
            <div class="row">
                <!-- INICIO do Listar Perguntas -->
                <div class="col-md-8 blog-main">
                    <?php
                    if (empty($this->Dados['pergunta'])) {
                        echo "<div class='alert alert-danger'>Erro: Nenhum pergunta encontrado!</div>";
                    }
                    foreach ($this->Dados['pergunta'] as $pergunta) {
                        extract($pergunta);
                        ?>
                        <div class="jumbotron container blog-text  anim_right p-1">
                            <a href="<?php echo URL . 'pergunta/pergunta/' . $id; ?>">
                                <h2 class="featurette-heading text-danger"><?php echo $conteudo; ?></h2>
                            </a>
                            <p class="lead"><a href="<?php echo URL . 'pergunta/pergunta/' . $id; ?>" class="text-danger">Continuar lendo</a></p>
                        </div>
                    <?php
                    }

                    echo $this->Dados['paginacao'];
                    ?>
                </div>
                <!-- FIM do Listar Perguntas -->

                <aside class="col-md-4 blog-sidebar">
                    <!-- INICIO Area de Recentes -->
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Recentes
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            foreach ($this->Dados['pergRecente'] as $perguntaRec) {
                                extract($perguntaRec);
                                echo "<li class='list-group-item'><a href='" . URL . "pergunta/pergunta/$id'>$conteudo</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- FIM da Area de Recentes -->
                    <br>
                    <br>
                    <br>
                    <!-- Area de Destaque -->
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Destaque
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
                    <!-- Fim da Area de Destaque -->
                </aside>
            </div>
        </div>


</main>