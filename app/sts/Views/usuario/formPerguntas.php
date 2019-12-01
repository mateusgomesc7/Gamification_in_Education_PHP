<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="mr-auto p-2">
                    <h2 class="display-4 titulo">Faça sua pergunta</h2>
                </div>
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">

                    
                    <div class="form-row">
                        <div class="form-group col">
                            <label><span class="text-danger">*</span> Título</label>
                            <input name="nome" type="text" class="form-control" placeholder="Digite o título da pergunta" value="<?php
                                                                                                                            if (isset($valorForm['nome'])) {
                                                                                                                                echo $valorForm['nome'];
                                                                                                                            }
                                                                                                                            ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> E-mail</label>
                            <input name="email" type="text" class="form-control" placeholder="Seu melhor e-mail" value="<?php
                                                                                                                        if (isset($valorForm['email'])) {
                                                                                                                            echo $valorForm['email'];
                                                                                                                        }
                                                                                                                        ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Usuário</label>
                            <input name="usuario" type="text" class="form-control" id="nome" placeholder="Digite o usuário" value="<?php
                                                                                                                                    if (isset($valorForm['usuario'])) {
                                                                                                                                        echo $valorForm['usuario'];
                                                                                                                                    }
                                                                                                                                    ?>">
                        </div>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input name="EdiPerfil" type="submit" class="btn btn-warning" value="Salvar">
                </div>
            </form>

        </div>
    </div>
</div>