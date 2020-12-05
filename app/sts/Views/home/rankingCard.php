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

            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>$primEsegun_nome<span class='badge badge-primary badge-pill'>$pontos</span></li>";
        }
        ?>
    </ul>
</div>