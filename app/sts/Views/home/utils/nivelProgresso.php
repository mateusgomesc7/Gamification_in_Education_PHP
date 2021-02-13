<?php
echo "<div class='row no-gutters'>";
echo "<div class='col-3'>";
echo "<div class='card text-white text-center' style='background-color: #007bff !important;'>";
echo "<h6 class='card-title m-0 text-uppercase'><small>Nível</small></h6>";
foreach ($this->Dados['nivel'] as $nivel) {
    extract($nivel);

    echo "<div class='card-body p-0 m-0 h4'>" . $id . "</div>";
}
echo "</div>";
echo "</div>";
echo "<div class='col-9 d-flex flex-column justify-content-center'>";
echo "<div class='progress'>";
foreach ($this->Dados['pontosAtual'] as $pontosAtual) {
    extract($pontosAtual);
    $quantPontosAnterior = $quant_pontos;
    foreach ($this->Dados['pontosProxNivel'] as $pontosProxNivel) {
        extract($pontosProxNivel);
        $quantPontosMax = $quant_pontos - $quantPontosAnterior;
        $porcentagem = (($pontos - $quantPontosAnterior) / $quantPontosMax) * 100;
        echo "<div 
                class='progress-bar' role='progressbar' 
                style='width: " . $porcentagem . "%;' 
                aria-valuenow='" . $porcentagem . "' 
                aria-valuemin='0' 
                aria-valuemax='" . $quantPontosMax . "'>";
        if ($porcentagem >= 30) {
            echo $pontos;
        }
        echo "</div>
                <div class='text-primary font-weight-bold'>";
        if ($porcentagem < 30) {
            echo $pontos;
        }
        echo "</div>";
    }
}
echo "</div>";
echo "</div>";
echo "</div>";
?>