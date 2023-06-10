<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL Lab - BD2</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://kit.fontawesome.com/c901037923.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
</head>
<body>
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'movies/movies';
        (isset($_GET['loader']) && $_GET['loader'] == 'none') ? null : require_once 'components/loader.php';
        require_once 'components/header.php';
        require_once 'pages/'.$page.'.php'; //Esto hace que lo que esté entre el header y el footer sea dinámico
    ?>
</body>
</html>

<style>
    <?php require 'assets/styles/style.css' // Esto se hace para importar estilos css en un archivo php ?>
</style>