<?php
if (!defined('URL')) {
    header("Location: /");
    exit();
}
?>
<div class="d-flex">
    <nav class="sidebar text-center">
        <div class="btn-group-vertical">
            <a href="<?php echo URL . 'ver-perguntas/perguntas'; ?>">
                <button type="button" class="btn btn-outline-primary m-1">
                    <i class="fas fa-university"></i> Todas as matérias
                </button>
            </a>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-balance-scale"></i> ENEM</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-square-root-alt"></i> Matemática</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-book"></i> História</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-globe-americas"></i> Geografia</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-paw"></i> Biologia</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-book-reader"></i> Português</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-lightbulb"></i> Física</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fas fa-atom"></i> Química</button>
            <button type="button" class="btn btn-outline-primary m-1"><i class="fab fa-angellist"></i> Filosofia</button>
        </div>
    </nav>