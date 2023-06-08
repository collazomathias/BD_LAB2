<div class="container-sidebar">
    <div class="container-logo">
        <img class="logo" src="assets/images/logo.png" alt="logo">
    </div>
    <div class="container-menu">
        <a href="?page=home" class="<?php echo $page == 'home' ? 'active' : '' ?> menu-item">
            <i class="fas fa-home"></i>
            <p class="nav-item-name">Home</p>
        </a>
        <a href="?page=movies/movies" class="<?php echo $page == 'movies/movies' ? 'active' : '' ?> menu-item">
            <i class="fas fa-film"></i>
            <p class="nav-item-name">Movies</p>
        </a>
        <a href="?page=actors/actors" class="<?php echo $page == 'actors/actors' ? 'active' : '' ?> menu-item">
            <i class="fas fa-user-circle"></i>
            <p class="nav-item-name">Actors</p>
        </a>
    </div>
</div>
<!--<div class="container-banner">
    <img src="assets/images/banner.png" alt="banner">
</div>-->

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>
