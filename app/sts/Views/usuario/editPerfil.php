<div class="container my-3 p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar Perfil</h2>
            </div>
            <div class="p-2">
                <a href="<?php echo URL . 'ver-perfil/perfil'; ?>" class="btn btn-outline-primary btn-sm">Visualizar</a>
            </div>
        </div>
        <hr>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        if (isset($this->Dados['form'])) {
            $valorForm = $this->Dados['form'];
        }
        if (isset($this->Dados['form'][0])) {
            $valorForm = $this->Dados['form'][0];
        }
        ?>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-row">
                <!-- Início Editar NOME -->
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Digite o nome completo" value="<?php
                                                                                                                    if (isset($valorForm['nome'])) {
                                                                                                                        echo $valorForm['nome'];
                                                                                                                    }
                                                                                                                    ?>">
                </div>
                <!-- Início Editar Curso -->
                <div class="form-group col-md-4">
                    <label><span class="text-danger">*</span> Curso</label>
                    <select name="curso1" id="curso1" class="form-control">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($this->Dados['select']['curso1'] as $curso1) {
                            extract($curso1);
                            if ($valorForm['curso1'] == $id_curso) {
                                echo "<option value='$id_curso' selected>$nome_curso1</option>";
                            } else {
                                echo "<option value='$id_curso'>$nome_curso1</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <!-- Início Editar E-mail -->
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> E-mail</label>
                    <input name="email" type="text" class="form-control" placeholder="Seu melhor e-mail" value="<?php
                                                                                                                if (isset($valorForm['email'])) {
                                                                                                                    echo $valorForm['email'];
                                                                                                                }
                                                                                                                ?>">
                </div>
                <!-- Início Editar Usuário -->
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Usuário</label>
                    <input name="usuario" type="text" class="form-control" id="nome" placeholder="Digite o usuário" value="<?php
                                                                                                                            if (isset($valorForm['usuario'])) {
                                                                                                                                echo $valorForm['usuario'];
                                                                                                                            }
                                                                                                                            ?>">
                </div>
            </div>

            <div class="form-row">
                <!-- Início Editar Escolhe Imagem -->
                <div class="form-group col-md-6">
                    <input name="imagem_antiga" type="hidden" value="<?php
                                                                        if (isset($valorForm['imagem_antiga'])) {
                                                                            echo $valorForm['imagem_antiga'];
                                                                        } elseif (isset($valorForm['imagem'])) {
                                                                            echo $valorForm['imagem'];
                                                                        }
                                                                        ?>">

                    <label><span class="text-danger">*</span> Foto (150x150)</label>
                    <input name="imagem_nova" type="file" onchange="previewImagem();">
                </div>
                <!-- Início Editar Preview da Imagem -->
                <div class="form-group col-md-6">
                    <?php
                    if (isset($valorForm['imagem']) and !empty($valorForm['imagem'])) {
                        $imagem_antiga = URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem'];
                    } else {
                        $imagem_antiga = URL . 'assets/imagens/usuario/preview_img.png';
                    }
                    ?>
                    <img src="<?php echo $imagem_antiga; ?>" alt="Imagem do Usuário" id="preview-user" class="img-thumbnail" style="width: 150px; height: 150px;">
                </div>
            </div>

            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input name="EdiPerfil" type="submit" class="btn btn-warning" value="Salvar">
        </form>
    </div>
</div>