<?php

    require $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    $connection = connect();

?>

<div class="page-container">
    <div class="title-container">
        <h1 class="page-title">MOVIES</h1>
    </div>
    <div class="movies-container">
        <div class="container">
            <div class="movies-table-container">
                <?php include_once 'movies_table.php'; ?>
            </div>
            <div class="pagination-container">
                <?php include_once 'movies_paginator.php'; ?>
            </div>
        </div>
        <div class="form-container">
            <form id="movie-form" action="pages/movies/create_movie.php" method="POST">
                <p>MOVIE MANAGEMENT</p>
                <div class="movie-information-container">
                    <input type="text" id="input-movie-id" name="movie-id" class="hidden">
                    <input type="text" id="input-movie-language" name="movie-language" class="hidden">
                    <label for="input-movie-title">Title</label>
                    <input type="text" id="input-movie-title" name="movie-title">
                    <label for="input-lastname">Description</label>
                    <textarea id="text-area-movie-description" name="movie-description"></textarea>
                    <div class="movie-input-container">
                        <div class="movie-label-input three-columns">
                            <label for="input-lastname">Year</label>
                            <input type="text" id="input-movie-year" name="movie-year">
                        </div>
                        <div class="movie-label-input three-columns">
                            <label for="input-lastname">Duration</label>
                            <input type="text" id="input-movie-duration" name="movie-duration">
                        </div>
                        <div class="movie-label-input three-columns">
                            <label for="input-lastname">Clasification</label>
                            <input type="text" id="input-movie-clasification" name="movie-clasification">
                        </div>
                    </div>
                    <div class="movie-input-container">
                        <div class="movie-label-input three-columns">
                            <label for="input-lastname">Rental cost</label>
                            <input type="text" id="input-movie-rental-cost" name="movie-rental-cost">
                        </div>
                        <div class="movie-label-input three-columns">
                            <label for="input-lastname">Replacement cost</label>
                            <input type="text" id="input-movie-replacement-cost" name="movie-replacement-cost">
                        </div>
                        <div class="movie-label-input three-columns">
                            <label for="movie-language">Language</label>
                            <select name="movie-language" id="movie-language">
                                <?php foreach($query_languages_result as $language) { ?>
                                    <option value="<?php echo $language['idIdioma'] ?>"><?php echo $language['idioma'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <label for="input-lastname">Extra content</label>
                    <input type="text" id="input-movie-extra-content" name="movie-extra-content">
                    <div class="form-buttons-container">
                        <div id="movie-clear-form-container" class="hidden"><i id="clear-form" class="fas fa-eraser"></i>Reset</div>
                        <input id="movie-create-update-button" type="submit" value="Create" class="submit-button update-button">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    isset($_GET['modal-success']) ? require_once 'components/modal_success.php' : '';
    isset($_GET['modal-failed']) ? require_once 'components/modal_failed.php' : '';
    disconnect($connection);
?>

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>

