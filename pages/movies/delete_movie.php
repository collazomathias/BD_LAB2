<?php

echo 'DELETE MOVIE<br><br>';
echo 'ID: ';
echo isset($_POST['movie-id']) ? $_POST['movie-id'].'<br>' : '<br>'; 

require '../../connection_manager.php';
$connection = connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movie-id']) && $_POST['movie-id'] != "") {
    $idPelicula = $_POST['movie-id'];
    $delete_query_peliculas = "DELETE FROM peliculas WHERE idPelicula = $idPelicula";
    $delete_query_actoresDePeliculas = "DELETE FROM actoresDePeliculas WHERE idPelicula = $idPelicula";
    $delete_query_idiomasDePeliculas = "DELETE FROM idiomasDePeliculas WHERE idPelicula = $idPelicula";
    $delete_query_categoriasDePeliculas = "DELETE FROM categoriasDePeliculas WHERE idPelicula = $idPelicula";
    $delete_query_inventario = "DELETE FROM inventario WHERE idPelicula = $idPelicula";
    $delete_query_alquileres = "DELETE FROM alquileres WHERE idPelicula = $idPelicula";
    $delete_query_pagos = "DELETE FROM pagos WHERE idPeliculaAlquilo = $idPelicula";
    
    $query_result_peliculas = mysqli_query($connection, $delete_query_peliculas);
    $affected_rows_peliculas = mysqli_affected_rows($connection);

    if ($affected_rows_peliculas > 0) {
        mysqli_query($connection, $delete_query_actoresDePeliculas);
        mysqli_query($connection, $delete_query_idiomasDePeliculas);
        mysqli_query($connection, $delete_query_categoriasDePeliculas);
        mysqli_query($connection, $delete_query_inventario);
        mysqli_query($connection, $delete_query_alquileres);
        mysqli_query($connection, $delete_query_pagos);
        
        $affected_rows_actoresDePeliculas = mysqli_affected_rows($connection);
        $affected_rows_idiomasDePeliculas = mysqli_affected_rows($connection);
        $affected_rows_categoriasDePeliculas = mysqli_affected_rows($connection);
        $affected_rows_inventario = mysqli_affected_rows($connection);
        $affected_rows_alquileres = mysqli_affected_rows($connection);
        $affected_rows_pagos = mysqli_affected_rows($connection);
        
        if ($affected_rows_actoresDePeliculas >= 0 && $affected_rows_idiomasDePeliculas >= 0 && $affected_rows_categoriasDePeliculas >= 0 && $affected_rows_inventario >= 0 && $affected_rows_alquileres >= 0 && $affected_rows_pagos >= 0) {
            echo '<script>window.location="/?page=movies/movies&modal-success=1&action=delete&type=movie";</script>';
        } else {
            echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=delete&type=movie";</script>';
        }
    } else {
        echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=delete&type=movie";</script>';
    }
} else {
    echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=delete&type=movie";</script>';
}

?>
