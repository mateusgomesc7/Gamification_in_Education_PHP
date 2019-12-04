<?php
if (isset($this->Dados['form'])) {
    $valorForm = $this->Dados['form'];
}
if (isset($this->Dados['form'][0])) {
    $valorForm = $this->Dados['form'][0];
}
//var_dump($this->Dados['select']);
?>
<div class="content p-1">
    <div class="list-group-item">

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        
        <form method="POST" action="" enctype="multipart/form-data"> 

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Nome</label>
                    <input name="titulo" type="text" class="form-control" placeholder="Titulo da pergunta" value="<?php
                    if (isset($valorForm['titulo'])) {
                        echo $valorForm['titulo'];
                    }
                    ?>">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Conteúdo da pergunta</label>
                    <textarea name="conteudo" id="editor-dois" class="form-control" rows="3"><?php
                        if (isset($valorForm['conteudo'])) {
                            echo $valorForm['conteudo'];
                        }
                        ?>
                    </textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label><span class="text-danger">*</span> Categoria da Pergunta</label>
                    <select name="sts_cats_pergunta_id" id="sts_cats_pergunta_id" class="form-control">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($this->Dados['select']['catart'] as $catart) {
                            extract($catart);
                            if (isset($valorForm['sts_cats_pergunta_id']) AND $valorForm['sts_cats_pergunta_id'] == $id_catart) {
                                echo "<option value='$id_catart' selected>$nome_catart</option>";
                            } else {
                                echo "<option value='$id_catart'>$nome_catart</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>         

            <?php
            if ($this->Dados['botao']['edit_autor_art']) {
                ?>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Autor da Pergunta</label>
                        <select name="sts_usuario_id" id="sts_usuario_id" class="form-control">
                            <option value="">Selecione</option>
                            <?php
                            $cont = 1;
                            foreach ($this->Dados['select']['user'] as $user) {
                                extract($user);
                                if (isset($valorForm['sts_usuario_id']) AND $valorForm['sts_usuario_id'] == $id_user) {
                                    echo "<option value='$id_user' selected>$nome_user</option>";
                                    $cont = 2;
                                } elseif (($_SESSION['usuario_id'] == $id_user) AND ( $cont == 1)) {
                                    echo "<option value='$id_user' selected>$nome_user</option>";
                                } else {
                                    echo "<option value='$id_user'>$nome_user</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <input name="sts_usuario_id" type="hidden" value="<?php echo $_SESSION['usuario_id']; ?>">
                <?php
            }
            ?> 

            <hr>

            <input name="CadPergunta" type="submit" class="btn btn-warning" value="Salvar">
        </form>
    </div>
</div>  