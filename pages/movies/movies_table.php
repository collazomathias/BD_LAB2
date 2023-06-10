<?php
    
    include_once $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
    if(!isset($connection)) $conn = connect();
    
    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
    $total_select_query = "SELECT * FROM peliculas";
    $total_query_result = mysqli_query(isset($connection) ? $connection : $conn, $total_select_query);
    $per_page = 30;
    $start = ($currentPage - 1) * $per_page;
    $limited_select_query = "SELECT * FROM peliculas LIMIT $start,$per_page";
    $query_result = mysqli_query(isset($connection) ? $connection : $conn, $limited_select_query);
    $count = mysqli_num_rows($total_query_result);
    $pages = ceil($count / $per_page);
    $query_languages = "SELECT * from idiomas";
    $query_languages_result = mysqli_query(isset($connection) ? $connection : $conn, $query_languages);

    if ($query_result) {
        ob_start(); 
    ?>
        <table id="movies-table">
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
        </table>
    <?php
        $tableHTML = ob_get_clean();
        echo $tableHTML;
    } else echo 'There are no results to show.';

    if(isset($conn)) disconnect($conn);

?>
