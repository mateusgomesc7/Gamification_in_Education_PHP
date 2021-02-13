<div class="card text-center p-4 justify-content-center my-3">

    <?php
    $nome = explode(" ", $_SESSION['usuario_nome']);
    $prim_nome = $nome[0];
    echo "<h5 class='card-title'>$prim_nome</h5>";
    ?>

    <?php

    include('app/sts/Views/home/utils/imagemPerfil.php');

    ?>

    <div class="card-body p-0">
        <?php

        include('app/sts/Views/home/utils/nivelProgresso.php');

        include('app/sts/Views/home/utils/emblemas.php');

        ?>
    </div>
</div>