<body class="text-center">
    <div class="container">
        <div class="row p-0 no-gutters bg-success rounded">
            <div class="col-lg-8">
                <div class="card border-0 p-4 h-100" style="
            background-color: transparent !important;
            ">
                    <h5 class="card-title display-4">Gamification</h5>
                    <div class="card-body lead">
                        <p>
                            A pesquisa tem o intuito de auxiliar na criação de uma página que visa atender e suprir necessidades pedagógicas dos alunos.
                        </p>
                        <p>
                            Utilizando componentes gamificados, que foram criados para atender e auxiliar os alunos EAD, bem como a sua interação e eficácia no aprendizados dos alunos.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img class="mb-4" src="<?php echo URL . 'assets/imagens/logo_login/logo.png'; ?>" alt="Gamification" width="72" height="72">
                        <h1 class="h3 mb-3 font-weight-normal">Entrar no Gamification</h1>
                        <form method="POST" action="">
                            <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                            if (isset($this->Dados['form'])) {
                                $valorForm = $this->Dados['form'];
                            }
                            ?>
                            <div class="form-group">
                                <label>Usuário ou E-mail</label>
                                <input name="usuario" type="text" class="form-control" placeholder="Digite o usuário" value="<?php if (isset($valorForm['usuario'])) {
                                                                                                                                    echo $valorForm['usuario'];
                                                                                                                                } ?>">
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input name="senha" type="password" class="form-control" placeholder="Digite a senha">
                            </div>
                            <input name="SendLogin" type="submit" class="btn btn-lg btn-primary btn-block" value="Acessar">
                        </form>
                        <p class="text-center my-2"><a href="<?php echo URL . 'novo-usuario/novo-usuario' ?>">Cadastrar</a> - <a href="<?php echo URL . 'esqueceu-senha/esqueceu-senha' ?>">Esqueceu a senha?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>