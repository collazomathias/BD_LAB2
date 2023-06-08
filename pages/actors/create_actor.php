<?php

require '../../connection_manager.php';
$connection = connect();

if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['lastname']) && $_POST['lastname'] != "") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $create_query = "INSERT INTO actores VALUES(NULL, '$name', '$lastname');";
    $query_result = mysqli_query($connection, $create_query);
    echo ($query_result) ? '<script>window.location="/?page=actors/actors&modal-success=1&action=create&type=actor";</script>' : '<script>window.location="/?page=actors/actors&modal-failed=1&action=create&type=actor";</script>';    
} else {
    echo '<script>window.location="/?page=actors/actors&modal-failed=1&action=create&type=actor";</script>';
}

?>