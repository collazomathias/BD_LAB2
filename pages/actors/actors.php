<?php

    require $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    $connection = connect();

?>

<div class="page-container">
    <div class="title-container">
        <h1 class="page-title">ACTORS</h1>
    </div>
    <div class="actors-container">
        <div class="container">
            <div class="actors-table-container">
                <?php include_once 'actors_table.php'; ?>
            </div>
            <div class="pagination-container">
                <?php include_once 'actors_paginator.php' ?>
            </div>
        </div>
        <div class="form-container">
            <form id="actor-form" action="pages/actors/create_actor.php" method="POST">
                <p>ACTOR MANAGEMENT</p>
                <div class="actor-information-container">
                    <input type="text" id="input-id" name="id" class="hidden">
                    <label for="input-name">Name</label>
                    <input type="text" id="input-name" name="name">
                    <label for="input-lastname">Lastname</label>
                    <input type="text" id="input-lastname" name="lastname">
                    <div class="form-buttons-container">
                        <div id="clear-form-container" class="hidden"><i id="clear-form" class="fas fa-eraser"></i>Reset</div>
                        <input id="create-update-button" type="submit" value="Create" class="submit-button update-button">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
    isset($_GET['modal-success']) ? require 'components/modal_success.php' : '';
    isset($_GET['modal-failed']) ? require 'components/modal_failed.php' : '';
    if(isset($connection)) disconnect($connection);
?>

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>

