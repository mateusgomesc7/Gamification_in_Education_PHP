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
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Cadastrar Tipo de Página</h2>
            </div>
            <?php
            if ($this->Dados['botao']['list_tpg']) {
                ?>
                <div class="p-2">
                <a href="<?php echo URLADM . 'tipo-pg/listar'; ?>" class="btn btn-outline-info btn-sm">Listar</a>
            </div>
                <?php
            }
            ?>
            
            
        </div><hr>
        <?php
        if (isset($_SESSION['adms_msg'])) {
            echo $_SESSION['adms_msg'];
            unset($_SESSION['adms_msg']);
        }
        ?>
        <form method="POST" action="" enctype="multipart/form-data"> 
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Tipo</label>
                    <input name="tipo" type="text" class="form-control" placeholder="Tipo da página Ex: adms, sts" value="<?php
                    if (isset($valorForm['tipo'])) {
                        echo $valorForm['tipo'];
                    }
                    ?>">
                </div>
                <div class="form-group col-md-6">
                    <label><span class="text-danger">*</span> Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome do tipo da página" value="<?php
                    if (isset($valorForm['nome'])) {
                        echo $valorForm['nome'];
                    }
                    ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label><span class="text-danger">*</span> Observação</label>
                <textarea name="obs" class="form-control" rows="3"><?php
                    if (isset($valorForm['obs'])) {
                        echo $valorForm['obs'];
                    }
                    ?>
                </textarea>
            </div>

            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input name="CadTipoPg" type="submit" class="btn btn-warning" value="Salvar">
        </form>
    </div>
</div>
