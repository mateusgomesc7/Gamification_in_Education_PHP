<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<div class="container">
    <div class="row">

        <div class="col-md-9 col-lg-9">
            <div class="row justify-content-center">
                <div class="jumbotron mb-0 bg-white">
                    <h1 class="display-4"><strong>Qual a sua dúvida?</strong></h1>
                    <hr class="my-4">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">Faça uma pergunta</button>

                    <?php
                    include 'app/sts/Views/pergunta/cadPergunta.php';
                    ?>

                </div>
            </div>
            <div class="row">
                <div class="card mb-1">
                    <div class="card-header">
                        <i class="fas fa-user-graduate"></i> Matemática
                    </div>
                    <div class="card-body">
                        <p class="card-text">2) Dentre as assertivas a seguir, assinale a única alternativa que corresponde a uma hipótese de inexigibilidade de licitação, prevista no artigo...</p>
                        <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                </div>
                <div class="card mb-1">
                    <div class="card-header">
                        <i class="fas fa-user-ninja"></i> Português
                    </div>
                    <div class="card-body">
                        <p class="card-text">2) Dentre as assertivas a seguir, assinale a única alternativa que corresponde a uma hipótese de inexigibilidade de licitação, prevista no artigo...</p>
                        <a href="#" class="btn btn-primary">Responder</a>
                    </div>
                </div>
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
                Alguma coisa
            </div>
            <div class="row">
                Mais alguma coisa
            </div>
        </div>

    </div>