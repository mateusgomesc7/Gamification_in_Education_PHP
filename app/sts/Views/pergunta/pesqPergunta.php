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
                                <h2 class="featurette-heading text-danger"><?php echo $titulo; ?></h2>
                            </a>
                            <p class="lead"><a href="<?php echo URL . 'pergunta/pergunta/' . $id; ?>" class="text-danger">Continuar lendo</a></p>
                        </div>
                    <?php
                    }

                    echo $this->Dados['paginacao'];
                    ?>
                </div>
                <aside class="col-md-4 blog-sidebar">
                    <?php if (!empty($this->Dados['sobreAutor'][0])) { ?>
                        <div class="p-3 mb-3 bg-light rounded">
                            <?php extract($this->Dados['sobreAutor'][0]); ?>
                            <h4 class="font-italic"><?php echo $titulo; ?></h4>
                            <img src="<?php echo URL . 'assets/imagens/sobre_autor/' . $id . '/' . $imagem; ?>" class="img-fluid" alt="<?php echo $titulo; ?>">
                            <p class="mb-0"><?php echo $descricao; ?></p>

                        </div>
                    <?php } ?>
                    <!-- Area de Recentes -->
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Recentes
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php
                            foreach ($this->Dados['pergRecente'] as $perguntaRec) {
                                extract($perguntaRec);
                                echo "<li class='list-group-item'><a href='" . URL . "pergunta/pergunta/$id'>$titulo</a></li>";
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Fim da Area de Recentes -->
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
                                    echo "<li class='list-group-item'><a href='" . URL . "pergunta/pergunta/$id'>$titulo</a></li>";
                                }
                                ?>
                        </ul>
                    </div>
                    <!-- Fim da Area de Destaque -->
                </aside>
            </div>
        </div>


</main>