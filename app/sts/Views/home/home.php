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
                <div class="jumbotron mb-0 bg-white">
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
            <div class="row justify-content-center">
                <div class="card">
                    <div class="row no-gutters px-2">
                        <div class="d-md-none d-lg-inline col-lg-4">
                            
                            
                            <?php if (isset($_SESSION['usuario_imagem']) AND ( !empty($_SESSION['usuario_imagem']))) { ?>
                        
                            <img 
                                class="rounded-circle" 
                                src="<?php echo URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" 
                                width="80" 
                                height="80">

                            <?php } else { ?>
                                
                                <i class="fas fa-user display-1"></i>
                                
                            <?php
                                }
                            ?>

                        </div>    
                        <div class="col-lg-8">
                            <div class="card-body">                            

                                <?php    
                                    $nome = explode(" ", $_SESSION['usuario_nome']);
                                    $prim_nome = $nome[0];
                                    echo "<h5 class='card-title'>$prim_nome</h5>";
                                    echo "<p class='card-text'><small class='text-muted'>Pontos: 100</small></p>";
                                ?>
        

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                Ranking
            </div>
            
            <div class="row">
                <div class="p-3">
                    <h4 class="font-italic">Destaque</h4>
                    <ol class="list-unstyled">
                        <?php
                        foreach ($this->Dados['pergDestaque'] as $perguntaDest) {
                            extract($perguntaDest);
                            echo "<li><a href='" . URL . "pergunta/pergunta/$id'>$titulo</a></li>";
                        }
                        ?>
                    </ol>
                </div>
            </div>
        </div>

    </div>