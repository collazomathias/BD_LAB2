<?php 

echo 'UPDATE MOVIE<br><br>';
echo 'ID: ';
echo isset($_POST['movie-id']) ? $_POST['movie-id'].'<br>' : '<br>';
echo 'Language: ';
echo isset($_POST['movie-language']) ? $_POST['movie-language'].'<br>' : '<br>';
echo 'Title: ';
echo isset($_POST['movie-title']) ? $_POST['movie-title'].'<br>' : '<br>';
echo 'Description: ';
echo isset($_POST['movie-description']) ? $_POST['movie-description'].'<br>' : '<br>';
echo 'Year: ';
echo isset($_POST['movie-year']) ? $_POST['movie-year'].'<br>' : '<br>';
echo 'Rental cost: ';
echo isset($_POST['movie-rental-cost']) ? $_POST['movie-rental-cost'].'<br>': '<br>';
echo 'Duration: ';
echo isset($_POST['movie-duration']) ? $_POST['movie-duration'].'<br>' : '<br>';
echo 'Replacement cost: ';
echo isset($_POST['movie-replacement-cost']) ? $_POST['movie-replacement-cost'].'<br>' : '<br>';
echo 'Clasification: ';
echo isset($_POST['movie-clasification']) ? $_POST['movie-clasification'].'<br>' : '<br>';
echo 'Extra content: ';
echo isset($_POST['movie-extra-content']) ? $_POST['movie-extra-content'].'<br>' : '<br>';

require $_SERVER['DOCUMENT_ROOT'] . '/connection_manager.php';
$connection = connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['movie-title']) && $_POST['movie-title'] != "" 
    && isset($_POST['movie-description']) && $_POST['movie-description'] != "" 
    && isset($_POST['movie-year']) && $_POST['movie-year'] != "" 
    && isset($_POST['movie-rental-cost']) && $_POST['movie-rental-cost'] != "" 
    && isset($_POST['movie-duration']) && $_POST['movie-duration'] != "" 
    && isset($_POST['movie-rental-cost']) && $_POST['movie-rental-cost'] != "" 
    && isset($_POST['movie-duration']) && $_POST['movie-duration'] != "" 
    && isset($_POST['movie-replacement-cost']) && $_POST['movie-replacement-cost'] != "" 
    && isset($_POST['movie-clasification']) && $_POST['movie-clasification'] != "" 
    && isset($_POST['movie-extra-content']) && $_POST['movie-extra-content'] != "") {

    $idPelicula = $_POST['movie-id'];
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

        $update_query = "UPDATE peliculas SET titulo='$titulo', descripcion='$descripcion', anio='$anio', costoAlquiler='$costoAlquiler', idIdiomaOriginal='$lenguage', duracion='$duracion', costoReemplazo='$costoReemplazo', clasificacion='$clasificacion', contenidosExtra='$contenidosExtra' WHERE idPelicula=$idPelicula";
        $query_result = mysqli_query($connection, $update_query);
        echo ($query_result) ? '<script>window.location="/?page=movies/movies&modal-success=1&action=update&type=movie";</script>' : '<script>window.location="/?page=movies/movies&modal-failed=1&action=update&type=movie";</script>';
    } else {
        echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=update&type=movie";</script>';
    }
} else {
    echo '<script>window.location="/?page=movies/movies&modal-failed=1&action=update&type=movie";</script>';
}

?>
