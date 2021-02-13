<div class="modal fade" id="perfilModalCenter" tabindex="-1" role="dialog" aria-labelledby="perfilModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                $nome = explode(" ", $_SESSION['usuario_nome']);
                $prim_nome = $nome[0];
                echo "<h5 class='modal-title' id='exampleModalLongTitle'>$prim_nome</h5>";
                ?>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <?php
                        include('app/sts/Views/home/utils/imagemPerfil.php');
                        include('app/sts/Views/home/utils/nivelProgresso.php');
                        ?>
                    </div>
                    <div class="col">
                        <h5>Curso(s):</h5>
                        <h5>Engenharia Elétrica</h5>
                        <h5>Emblemas:</h5>
                        <?php include('app/sts/Views/home/utils/emblemas.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>