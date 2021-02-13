<div class="card text-center mb-4">
    <div class="card-header">
        Ranking
    </div>
    <ul class="list-group">
        <?php
        foreach ($this->Dados['ranking'] as $ranking) {
            extract($ranking);
            // Pegando apenas o primeiro e segundo nome, se o útlimo tiver
            $nome = explode(" ", $nome);
            $primEsegun_nome = $nome[0] . " " . (isset($nome[1]) ? $nome[1] : "");

            echo "<li class='list-group-item p-0'>";
            // Button trigger modal
            echo "<button type='button' class='btn btn-light px-4 d-flex justify-content-between btn-block' data-toggle='modal' data-target='#perfilModalCenter'>";
            echo $primEsegun_nome;
            echo"<span class='badge badge-primary badge-pill my-1'>";
            echo $pontos;
            echo "</span>";
            echo "<span class='sr-only'>";
            echo $primEsegun_nome;
            echo "</span>";
            echo "</button>";
            echo "</li>";
        }
        ?>
    </ul>
    <!-- Modal -->
    <?php include('perfilmodal.php') ?>
</div>