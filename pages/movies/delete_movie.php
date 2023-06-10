<?php

    require $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    $connection = connect();

    if(isset($_POST['movie-id']) && $_POST['movie-id'] != "") {
        $idPelicula = $_POST['movie-id'];
        $delete_query_actoresDePeliculas = "DELETE FROM actoresDePeliculas WHERE idPelicula = $idPelicula";
        $delete_query_idiomasDePeliculas = "DELETE FROM idiomasDePeliculas WHERE idPelicula = $idPelicula";
        $delete_query_categoriasDePeliculas = "DELETE FROM categoriasDePeliculas WHERE idPelicula = $idPelicula";
        $delete_query_inventario = "DELETE FROM inventario WHERE idPelicula = $idPelicula";
        $delete_query_alquileres = "DELETE FROM alquileres WHERE idPelicula = $idPelicula";
        $delete_query_pagos = "DELETE FROM pagos WHERE idPeliculaAlquilo = $idPelicula";
        $delete_query_peliculas = "DELETE FROM peliculas WHERE idPelicula = $idPelicula";

        $query_result_actoresDePeliculas = mysqli_query($connection, $delete_query_actoresDePeliculas);
        $query_result_idiomasDePeliculas = mysqli_query($connection, $delete_query_idiomasDePeliculas);
        $query_result_categoriasDePeliculas = mysqli_query($connection, $delete_query_categoriasDePeliculas);
        $query_result_inventario = mysqli_query($connection, $delete_query_inventario);
        $query_result_alquileres = mysqli_query($connection, $delete_query_alquileres);
        $query_result_pagos = mysqli_query($connection, $delete_query_pagos);
        $query_result_peliculas = mysqli_query($connection, $delete_query_peliculas);

        if($query_result_actoresDePeliculas && $query_result_idiomasDePeliculas && $query_result_categoriasDePeliculas && $query_result_inventario && $query_result_alquileres && $query_result_pagos && $query_result_peliculas) {
            echo '<script>window.location="/?page=movies/movies&modal-success=1&action=delete&type=movie";</script>';    
        } else {
            echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=delete&type=movie";</script>';
        }
    } else {
        echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=delete&type=movie";</script>';
    }

    if(isset($connection)) disconnect($connection);

?>
