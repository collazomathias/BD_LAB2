<div class="container-sidebar">
    <div class="container-logo">
        <img class="logo" src="assets/images/logo.png" alt="logo">
    </div>
    <div class="container-menu">
        <a <?php echo ($page != 'movies/movies') ? 'href="?page=movies/movies"' : '' ?> class="<?php echo $page == 'movies/movies' ? 'active' : '' ?> menu-item">
            <i class="fas fa-film"></i>
            <p class="nav-item-name">Movies</p>
        </a>
        <a <?php echo ($page != 'actors/actors') ? 'href="?page=actors/actors"' : '' ?> class="<?php echo $page == 'actors/actors' ? 'active' : '' ?> menu-item">
            <i class="fas fa-user-circle"></i>
            <p class="nav-item-name">Actors</p>
        </a>
    </div>
</div>

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>
