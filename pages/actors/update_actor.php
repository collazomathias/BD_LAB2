<?php

require '../../connection_manager.php';
$connection = connect();

if(isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['lastname']) && $_POST['lastname'] != "") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $update_query = "UPDATE actores SET nombre = '$name', apellido = '$lastname' WHERE idActor = $id;";
    $query_result = mysqli_query($connection, $update_query);
    echo ($query_result) ? '<script>window.location="/?page=actors/actors&modal-success=1&action=update";</script>' : '<script>window.location="/?page=actors/actors&modal-failed=1&action=update";</script>';
} else {
    echo '<script>window.location="/?page=actors/actors&modal-failed=1&action=update";</script>';
}


?>