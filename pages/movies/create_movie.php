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

?>