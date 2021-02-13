<?php
echo "<div class='row no-gutters'>";
foreach ($this->Dados['emblemasPontos'] as $emblemasPontos) {
    extract($emblemasPontos);

    echo "<div class='col-3 mb-2'>";
    echo "<button type='button' class='btn btn-sm btn-$cor w-75' data-toggle='popover' data-placement='top' title='$nome' data-content='$descricao'><i class='$icone'></i></button>";
    echo "</div>";
}
echo "</div>";
?>
