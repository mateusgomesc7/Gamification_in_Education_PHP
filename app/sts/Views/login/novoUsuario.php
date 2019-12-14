<body>
    <div class="card py-1 m-auto text-center" style="width: 21rem;">
        <form class="form-signin" method="POST" action="">
            <img class="mb-4" src="<?php echo URL . 'assets/imagens/logo_login/logo.png'; ?>" alt="Gamification" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Novo Usuário</h1>
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
                <label>Nome</label>
                <input name="nome" type="text" class="form-control" placeholder="Digite o nome completo" value="<?php if (isset($valorForm['nome'])) {
                                                                                                                    echo $valorForm['nome'];
                                                                                                                } ?>">
            </div>
            <!-- Início Selecionar Curso -->
            <div class="form-group">
                <label for="curso1">Curso</label>
                <select class="form-control" name="curso1" id="curso1" style="height: 47px;">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($this->Dados['select']['curso1'] as $curso1) {
                        extract($curso1);                        
                            echo "<option value='$id_curso'>$nome_curso1</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>E-mail</label>
                <input name="email" type="text" class="form-control" placeholder="Digite o seu melhor e-mail" value="<?php if (isset($valorForm['email'])) {
                                                                                                                            echo $valorForm['email'];
                                                                                                                        } ?>">
            </div>
            <div class="form-group">
                <label>Usuário</label>
                <input name="usuario" type="text" class="form-control" placeholder="Digite o usuário" value="<?php if (isset($valorForm['usuario'])) {
                                                                                                                    echo $valorForm['usuario'];
                                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input name="senha" type="password" class="form-control" placeholder="Digite a senha">
            </div>
            <input name="CadUserLogin" type="submit" class="btn btn-lg btn-success btn-block" value="Cadastrar">
            <p class="text-center my-2"><a href="<?php echo URL . 'login/acesso' ?>">Clique aqui</a> para acessar</p>
        </form>
    </div>
</body>