<?php 
    require 'connection_manager.php';
    $connection = connect();
    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
    $total_select_query = "SELECT * FROM actores";
    $total_query_result = mysqli_query($connection, $total_select_query);
    $per_page = 30;
    $start = ($currentPage - 1) * $per_page;
    $limited_select_query = "SELECT * FROM actores LIMIT $start,$per_page";
    $query_result = mysqli_query($connection, $limited_select_query);
    $count = mysqli_num_rows($total_query_result);
    $pages = ceil($count / $per_page);
?>

<div class="page-container">
    <div class="title-container">
        <h1 class="page-title">ACTORS</h1>
    </div>
    <div class="actors-container">
        <div class="container">
            <div class="actors-table-container">
                <table>
                    <?php if($query_result) { ?>
                            <thead class="sticky">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                foreach($query_result as $row) {
                                    $id = $row['idActor'];
                                    $nombre = $row['nombre'];
                                    $apellido = $row['apellido'];
                                    $counter++;
                                ?>
                                    <tr class="<?php echo ($counter == $per_page) ? 'last-item' : 'item' ?>">
                                        <td><?php echo $id ?></td>
                                        <td><?php echo $nombre ?></td>
                                        <td><?php echo $apellido ?></td>
                                        <td>
                                            <button title="Edit actor" class="edit" val="<?php echo $id.'|'.$nombre.'|'.$apellido ?>"><i class="fas fa-edit"></i></button>
                                            <button title="Delete actor" val="<?php echo $id ?>" class="trash"><i class="fas fa-trash"></i></button>
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
                    echo '<p class="total-count">Actors total count: '.$count.' </p>';
                    $totalPages = 5; // Total de páginas a mostrar
                    $currentPage = (isset($_GET['pagenumber'])) ? (int)$_GET['pagenumber'] : 1;
                    $startPage = max(1, $currentPage - floor($totalPages / 2));
                    $endPage = min($startPage + $totalPages - 1, $pages);
                    if ($currentPage > 1) echo '<a class="pagination-item first-page" href="?page=actors/actors&pagenumber=1"><i class="fas fa-fast-backward"></i></a>';
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<a class="pagination-item';
                        echo ($i == $currentPage) ? ' active' : '';
                        echo '" href="?page=actors/actors&pagenumber=' . $i . '">' . $i . '</a>';
                    }
                    if ($currentPage < $pages) echo '<a class="pagination-item last-page" href="?page=actors/actors&pagenumber=' . $pages . '"><i class="fas fa-fast-forward"></i></a>';
                ?>
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

<?php isset($_GET['modal-success']) ? require 'components/modal_success.php' : '' ?> 
<?php isset($_GET['modal-failed']) ? require 'components/modal_failed.php' : '' ?> 

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>

