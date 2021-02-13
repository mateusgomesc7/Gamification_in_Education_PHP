<?php if (isset($_SESSION['usuario_imagem']) and (!empty($_SESSION['usuario_imagem']))) { ?>

    <img class="img" id="imgPerfil" src="<?php echo URL . 'assets/imagens/usuario/' . $_SESSION['usuario_id'] . '/' . $_SESSION['usuario_imagem']; ?>" alt="Imagem de capa do card">

<?php } else { ?>

    <img class="img" id="imgPerfil" src="<?php echo URL . 'assets/imagens/usuario/icone_usuario.png'; ?>" alt="Imagem de capa do card">

<?php
}
?>