<?php 
    require 'connection_manager.php';
    $connection = connect();
    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
    $total_select_query = "SELECT * FROM peliculas";
    $total_query_result = mysqli_query($connection, $total_select_query);
    $per_page = 30;
    $start = ($currentPage - 1) * $per_page;
    $limited_select_query = "SELECT * FROM peliculas LIMIT $start,$per_page";
    $query_result = mysqli_query($connection, $limited_select_query);
    $count = mysqli_num_rows($total_query_result);
    $pages = ceil($count / $per_page);
    $query_languages = "SELECT * from idiomas";
    $query_languages_result = mysqli_query($connection, $query_languages);
?>

<div class="page-container">
    <div class="title-container">
        <h1 class="page-title">MOVIES</h1>
    </div>
    <div class="movies-container">
        <div class="container">
            <div class="movies-table-container">
                <table>
                    <?php if($query_result) { ?>
                            <thead class="sticky">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Year</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                foreach($query_result as $row) {
                                    $id = $row['idPelicula'];
                                    $language = $row['idIdiomaOriginal'];
                                    $title = $row['titulo'];
                                    $description = $row['descripcion'];
                                    $year = $row['anio'];
                                    $rental_cost = $row['costoAlquiler'];
                                    $duration = $row['duracion'];
                                    $replacement_cost = $row['costoReemplazo'];
                                    $clasification = $row['clasificacion'];
                                    $extra_content = $row['contenidosExtra'];
                                    $counter++;
                                ?>
                                    <tr class="<?php echo ($counter == $per_page) ? 'last-item' : 'item' ?>">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $description ?></td>
                                        <td><?php echo $year ?></td>
                                        <td>
                                            <button title="View movie details" class="movie-view" val="<?php echo $id.'|'.$language.'|'.$title.'|'.$description.'|'.$year.'|'.$rental_cost.'|'.$duration.'|'.$replacement_cost.'|'.$clasification.'|'.$extra_content ?>"><i class="fas fa-eye"></i></button>
                                            <button title="Edit movie" class="movie-edit" val="<?php echo $id.'|'.$language.'|'.$title.'|'.$description.'|'.$year.'|'.$rental_cost.'|'.$duration.'|'.$replacement_cost.'|'.$clasification.'|'.$extra_content ?>"><i class="fas fa-edit"></i></button>
                                            <button title="Delete movie" val="<?php echo $id ?>" class="movie-trash"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        <?php } 
                        else echo 'There are no results to show.';
                    ?>
                </table>
            </div>
            <div class="pagination-container">
                <?php
                    echo '<p class="total-count">Movies total count: '.$count.' </p>';
                    $totalPages = 5; // Total de páginas a mostrar
                    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
                    $startPage = max(1, $currentPage - floor($totalPages / 2));
                    $endPage = min($startPage + $totalPages - 1, $pages);
                    if ($currentPage > 1) echo '<a class="pagination-item first-page" href="?page=movies/movies&pagenumber=1"><i class="fas fa-fast-backward"></i></a>';
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<a class="pagination-item';
                        echo ($i == $currentPage) ? ' active' : '';
                        echo '" href="?page=movies/movies&pagenumber=' . $i . '">' . $i . '</a>';
                    }
                    if ($currentPage < $pages) echo '<a class="pagination-item last-page" href="?page=movies/movies&pagenumber=' . $pages . '"><i class="fas fa-fast-forward"></i></a>';
                ?>
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
                        <div class="movie-label-input two-columns">
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

<?php isset($_GET['modal-success']) ? require 'components/modal_success.php' : '' ?> 
<?php isset($_GET['modal-failed']) ? require 'components/modal_failed.php' : '' ?> 

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>

