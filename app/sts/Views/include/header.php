<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>

<nav class="navbar navbar-expand navbar-dark bg-success">

    <!-- <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </! -->
    <?php
    echo "<a class='navbar-brand' href='" . URL . "home/index" . " '><img src='". URL ."assets/imagens/logo_login/logo.png' width='40' height='40' alt='Gamification'> <span class='d-none d-sm-none d-md-inline'>Gamification</span></a>";
    ?>

    <div class="collapse navbar-collapse">

        <!-- Início Pesquisa -->
        <form class="form-inline" method="POST" action="<?php echo URL . 'pesq-perguntas/listar'; ?>">
            <input class="" id="search" name="pergunta" type="text" placeholder="Pesquise sua dúvida..." value="<?php if (isset($_SESSION['pesqPergunta'])) {
                                                                                                                        echo $_SESSION['pesqPergunta'];
                                                                                                                    } ?>">
            <input name="PesqPergunta" type="hidden" class="btn btn-info my-2" value="Pesquisar">
        </form>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <?php if (isset($_SESSION['usuario_imagem']) and (!empty($_SESSION['usuario_imagem']))) { ?>

                        <img class="rounded-circle" src="<?php echo URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">

                        <?php } else { ?>

                            <img class="rounded-circle" src="<?php echo URL . 'assets/imagens/usuario/icone_usuario.png'; ?>" width="20" height="20"> &nbsp;<span class="d-none d-sm-inline">
                            <?php
                            }
                            $nome = explode(" ", $_SESSION['usuario_nome']);
                            $prim_nome = $nome[0];
                            echo $prim_nome;
                            ?> </span>

                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo URL . 'ver-perfil/perfil'; ?>"><i class="fas fa-user"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo URL . 'login/logout'; ?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>

            </li>

        </ul>

    </div>
</nav>