<?php

require '../../connection_manager.php';
$connection = connect();

if(isset($_POST['id']) && $_POST['id'] != "") {
    $id = $_POST['id'];
    $delete_query_actoresdepeliculas = "DELETE FROM actoresdepeliculas WHERE idActor = $id;";
    $delete_query_actores = "DELETE FROM actores WHERE idActor = $id;";
    $query_result_actoresdepeliculas = mysqli_query($connection, $delete_query_actoresdepeliculas);
    if($query_result_actoresdepeliculas) {
        $query_result_actores = mysqli_query($connection, $delete_query_actores);
    }
    echo (isset($query_result_actoresdepeliculas) && isset($query_result_actores)) ? '<script>window.location="/?page=actors/actors&modal-success=1&action=delete&type=actor";</script>' : '<script>window.location="/?page=actors/actors&modal-failed=1&action=delete&type=actor";</script>';    
} else {
    echo '<script>window.location="/?page=actors/actors&modal-failed=1&action=delete&type=actor";</script>';
}
?>