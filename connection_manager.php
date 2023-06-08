<?php

$user = 'usuario_videoclub';
$password = 'Djd5cQzB';
$host = 'localhost';
$database = 'videoclub';

function connect(){
    try {
        $connection = mysqli_connect($GLOBALS['host'], $GLOBALS['user'], $GLOBALS['password'], $GLOBALS['database']);
        return $connection;
    } catch(error_message) {
        echo "Connection failed, error: ".$error_message;
    }
}

function disconnect($connection){
    try {
        mysqli_close($connection);
    } catch(error_message) {
        echo "Disconnection failed, error: ".$error_message;
    }
}

?>