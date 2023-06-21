<?php 

    if(isset($_POST['movie-id']) && $_POST['movie-id'] != "" && isset($_POST['movie-title']) && $_POST['movie-title'] != "") {
        $id = $_POST['movie-id'];
        $title = $_POST['movie-title'];
        include_once $_SERVER['DOCUMENT_ROOT'].'/connection_manager.php';
        if(!isset($connection)) $conn = connect();
        $query_actors = "SELECT * FROM actores AS A, peliculas AS P, actoresdepeliculas AS ADP WHERE A.idActor = ADP.idActor AND P.idPelicula = ADP.idPelicula AND P.idPelicula = $id";
        $query_actors_result = mysqli_query(isset($connection) ? $connection : $conn, $query_actors);
        $total_rows_query_actors = mysqli_num_rows($query_actors_result);
        $query_sucursales = "SELECT * FROM sucursales AS S, peliculas AS P, inventario AS I WHERE S.idSucursal = I.idSucursal AND P.idPelicula = I.idPelicula AND P.idPelicula = $id AND I.cantEjemplares > 0";
        $query_sucursales_result = mysqli_query(isset($connection) ? $connection : $conn, $query_sucursales);
        $total_rows_query_sucursales = mysqli_num_rows($query_sucursales_result);
?>
        <div class="details-table-container">
        <?php if($query_actors_result && $total_rows_query_actors != 0) { ?>
            <div id="details-table-actors-container">
                <p>ACTORS FROM <strong class="table-title"><?php echo $title ?></strong></p>
                <table>
                <?php 
                $counter_actors = 0;
                foreach($query_actors_result as $actor) { 
                    $counter_actors++;    
                ?>
                    <tr <?php echo ($counter_actors == $total_rows_query_actors) ? 'class="last-item"' : '' ?>>
                        <td class="hidden"><?php echo $actor['idActor'] ?></td>
                        <td><?php echo $actor['nombre'] ?></td>
                        <td><?php echo $actor['apellido'] ?></td>
                        <td><button title="View actor details <?php echo $actor['idActor'] ?>" class="actor-view" val="<?php echo $actor['idActor'] ?>"><i class="fas fa-eye"></i></button></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        <?php } else { ?>
            <p>Failed to load movie actors.</p>
        <?php }
        if($query_sucursales_result && $total_rows_query_sucursales != 0) { ?>
            <div id="details-table-stores-container" class="closed">
                <p>STORES THAT RENT <strong class="table-title"><?php echo $title ?></strong></p>
                <table>
                <?php
                $counter_sucursales = 0; 
                foreach($query_sucursales_result as $sucursal) { 
                    $counter_sucursales++;
                ?>
                    <tr <?php echo ($counter_sucursales == $total_rows_query_sucursales) ? 'class="last-item"' : '' ?>>
                        <td class="hidden"><?php echo $sucursal['idSucursal'] ?></td>
                        <td><?php echo $sucursal['direccion'] ?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        <?php } else { ?>
            <p>Failed to load stores that sell the movie.</p>
        <?php } ?>
    </div>
    <?php } else {
        echo '<p>Failed to load movie data.</p>';
    } ?>