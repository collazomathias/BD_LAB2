<?php 

    require $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    $connection = connect();

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movie-title']) && $_POST['movie-title'] != "" 
        && isset($_POST['movie-description']) && $_POST['movie-description'] != "" 
        && isset($_POST['movie-year']) && $_POST['movie-year'] != "" 
        && isset($_POST['movie-rental-cost']) && $_POST['movie-rental-cost'] != "" 
        && isset($_POST['movie-duration']) && $_POST['movie-duration'] != "" 
        && isset($_POST['movie-rental-cost']) && $_POST['movie-rental-cost'] != "" 
        && isset($_POST['movie-duration']) && $_POST['movie-duration'] != "" 
        && isset($_POST['movie-replacement-cost']) && $_POST['movie-replacement-cost'] != "" 
        && isset($_POST['movie-clasification']) && $_POST['movie-clasification'] != "" 
        && isset($_POST['movie-extra-content']) && $_POST['movie-extra-content'] != "") {

        $lenguage = $_POST['movie-language'];
        $titulo = $_POST['movie-title'];
        $descripcion = $_POST['movie-description'];
        $anio = $_POST['movie-year'];
        $costoAlquiler = $_POST['movie-rental-cost'];
        $duracion = $_POST['movie-duration'];
        $costoReemplazo = $_POST['movie-replacement-cost'];
        $clasificacion = $_POST['movie-clasification'];
        $contenidosExtra = $_POST['movie-extra-content'];

        if (filter_var($anio, FILTER_VALIDATE_INT) !== false 
            && filter_var($duracion, FILTER_VALIDATE_INT) !== false
            && filter_var($costoAlquiler, FILTER_VALIDATE_FLOAT) !== false 
            && filter_var($costoReemplazo, FILTER_VALIDATE_FLOAT) !== false) {

            $create_query = "INSERT INTO peliculas (titulo, descripcion, anio, idIdiomaOriginal, costoAlquiler, duracion, costoReemplazo, clasificacion, contenidosExtra) VALUES ('$titulo', '$descripcion', '$anio', '$lenguage', '$costoAlquiler', '$duracion', '$costoReemplazo', '$clasificacion', '$contenidosExtra')";
            $query_result = mysqli_query($connection, $create_query);
            echo ($query_result) ? '<script>window.location="/?page=movies/movies&modal-success=1&action=create&type=movie";</script>' : '<script>window.location="/?page=movies/movies&modal-failed=1&action=create&type=movie";</script>';
        } else {
            echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=create&type=movie";</script>';
        }
    } else {
        echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=create&type=movie";</script>';
    }

    if(isset($connection)) disconnect($connection);

?>
