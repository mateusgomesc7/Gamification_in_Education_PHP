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
                <h2 class="display-4 titulo">Editar Nível de Acesso</h2>
            </div>

            <?php
            if ($this->Dados['botao']['vis_nivac']) {
                ?>
                <div class="p-2">
                    <a href="<?php echo URLADM . 'ver-niv-ac/ver-niv-ac/' . $valorForm['id']; ?>" class="btn btn-outline-primary btn-sm">Visualizar</a>
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
            <input name="id" type="hidden" value="<?php
            if (isset($valorForm['id'])) {
                echo $valorForm['id'];
            }
            ?>">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label><span class="text-danger">*</span> Nome</label>
                    <input name="nome" type="text" class="form-control" placeholder="Digite o nome do nível de acesso" value="<?php
                    if (isset($valorForm['nome'])) {
                        echo $valorForm['nome'];
                    }
                    ?>">
                </div>
            </div>

            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>
            <input name="EditNivAc" type="submit" class="btn btn-warning" value="Salvar">
        </form>
    </div>
</div>
