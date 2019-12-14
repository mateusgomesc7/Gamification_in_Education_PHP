
<body class="text-center">
    <div class="card py-1" style="width: 21rem;">
        <form class="form-signin" method="POST" action="">
            <img class="mb-4" src="<?php echo URL . 'assets/imagens/logo_login/logo.png'; ?>" alt="Gamification" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Entrar no Gamification</h1>
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
            <p class="text-center my-2"><a href="<?php echo URL . 'novo-usuario/novo-usuario' ?>">Cadastrar</a> - <a href="<?php echo URL . 'esqueceu-senha/esqueceu-senha' ?>">Esqueceu a senha?</a></p>
        </form>
    </div>
</body>