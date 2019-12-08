<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<main role="main">

    <!-- <div class="jumbotron blog"> -->
        <div class="container mt-5">
            <div class="row">
                <aside class="col-md-2 blog-sidebar">                      
                </aside>
                <div class="col-md-8 blog-main">
                <!-- Inicio da Area de Perguntas -->
                    <?php
                    if (!empty($this->Dados['sts_perguntas'][0])) {
                        extract($this->Dados['sts_perguntas'][0]);
                        ?>
                        <div class="card mb-1">
                            <div class="card-body ">
                                <h5 class="card-title display-4"><?php echo $titulo; ?></h5>
                                <hr class="my-4">
                                <p class="card-text"><?php echo $conteudo; ?></p>

                            </div>
                        </div>
                        <nav class="blog-pagination">
                            <?php
                            if (!empty($this->Dados['pergAnterior'][0])) {
                                extract($this->Dados['pergAnterior'][0]);
                                echo "<a class='btn btn-outline-primary' href='" . URL . "pergunta/pergunta/$id'>Anterior</a>";
                            } else {
                                echo "<a class='btn btn-outline-secondary disabled' href='#'>Anterior</a>";
                            }
                            if (!empty($this->Dados['pergProximo'][0])) {
                                extract($this->Dados['pergProximo'][0]);
                                echo "<a class='btn btn-outline-primary' href='" . URL . "pergunta/pergunta/$id'>Próximo</a>";
                            } else {
                                echo "<a class='btn btn-outline-secondary disabled' href='#'>Próximo</a>";
                            }
                            ?>
                        </nav>
                        <?php
                    } else {
                        echo "<div class='alert alert-danger'>Erro: Pergunta não encontrado!</div>";
                    }
                    ?>      
               
                    <span id="msg_comentario"></span>
                    <?php
                    
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    // Final das Perguntas
                    // Inicio do Forms
                    if (!empty($this->Dados['sts_perguntas'][0])) {
                        ?>
                        <div class="jumbotron text-white bg-primary p-3">
                        <h3>Participe da discussão</h3>
                        <form method="POST" action="<?php echo URL; ?>comentario/index">
                            <input type="hidden" name="sts_pergunta_id" value="<?php echo $this->Dados['sts_perguntas'][0]['id']; ?>">
                            <input type="hidden" name="id" value="<?php echo $this->Dados['sts_perguntas'][0]['id']; ?>">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome <span class="text-danger">*</span></label>                               
                                <div class="col-sm-10">
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo" value="<?php if(isset($_SESSION['form']['nome'])){echo $_SESSION['form']['nome']; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E-mail<span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Seu melhor e-mail" value="<?php if(isset($_SESSION['form']['email'])){echo $_SESSION['form']['email']; } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="conteudo" class="col-sm-2 col-form-label">Conteúdo<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="conteudo" id="conteudo" rows="3"><?php if(isset($_SESSION['form']['conteudo'])){echo $_SESSION['form']['conteudo']; } ?></textarea>
                                </div>
                            </div>
                            <input name="CadComent" type="submit" class="btn btn-secondary" value="Cadastrar">
                        </form>
                        </div>
                        <hr>
                        <?php
                    }
                    // Final do Forms
                    // Inicio dos Area dos Comentarios
                    if (!empty($this->Dados['sts_coment']['0'])) {
                        foreach ($this->Dados['sts_coment'] as $comentario) {
                            extract($comentario);
                            
                            echo "<div class='media'>";
                            if (!empty($imagem_user)) {
                                echo "<img class='mr-3' src='" . URL . "assets/imagens/usuario/$id_user/$imagem_user' alt='$nome' width='50' height='50'>";
                            } else {
                                echo "<img class='mr-3' src='" . URL . "assets/imagens/usuario/icone_usuario.png' alt='$nome' width='50' height='50'>";
                            }
                            echo "<div class='media-body'>";
                            echo "<h6 class='mt-0'>" . $nome . "</h6>";
                            echo $conteudo . "<br><br>";
                            echo "</div>";
                            echo "</div>";

                        }
                    }
                    ?>
                    <!-- Final dos Area dos Comentario -->
                </div>
                <aside class="col-md-2 blog-sidebar">                      
                </aside>
            </div>
        </div>
    <!-- </div>					 -->

</main>