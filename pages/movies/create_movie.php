<?php 

echo 'CREATE MOVIE<br><br>';
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

//TODO: Hay que ver como es el tema de los idiomas y todos los controles de los campos.
require '../../connection_manager.php';
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

    $lenguage = $_POST['movie-language'];
    $titulo = $_POST['movie-title'];
    $descripcion = $_POST['movie-description'];
    $anio = $_POST['movie-year'];
    $costoAlquiler = $_POST['movie-rental-cost'];
    $duracion = $_POST['movie-duration'];
    $costoReemplazo = $_POST['movie-replacement-cost'];
    $clasificacion = $_POST['movie-clasification'];
    $contenidosExtra = $_POST['movie-extra-content'];
    $create_query = "INSERT INTO peliculas (titulo, descripcion, anio, idIdiomaOriginal, costoAlquiler, duracion, costoReemplazo, clasificacion, contenidosExtra) VALUES ('$titulo', '$descripcion', '$anio', '$lenguage', '$costoAlquiler', '$duracion', '$costoReemplazo', '$clasificacion', '$contenidosExtra')";
    $query_result = mysqli_query($connection, $create_query);
}

if ($query_result) {
    echo "La película se agregó correctamente a la base de datos.";
} else {
    echo "Error al agregar la película: " . mysqli_error($connection);
}

?>
